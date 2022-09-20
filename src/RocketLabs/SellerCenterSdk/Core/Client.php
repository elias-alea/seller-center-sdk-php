<?php
namespace RocketLabs\SellerCenterSdk\Core;

use GuzzleHttp\Psr7\Request;
use RocketLabs\SellerCenterSdk\Core\Http\ClientInterface as HttpClientInterface;
use RocketLabs\SellerCenterSdk\Core\Http\GuzzleClientAdapter;
use RocketLabs\SellerCenterSdk\Core\Request\OutputFormatAdapter\OutputFormatAdapterInterface;
use RocketLabs\SellerCenterSdk\Core\Request\OutputFormatAdapter\XmlOutputFormatAdapter;
use RocketLabs\SellerCenterSdk\Core\Request\RequestInterface;
use RocketLabs\SellerCenterSdk\Core\Request\Signature\HashHmacRequestSignature;
use RocketLabs\SellerCenterSdk\Core\Request\Signature\RequestSignatureProviderInterface;
use RocketLabs\SellerCenterSdk\Core\Request\Timestamp\TimestampFormatter;
use RocketLabs\SellerCenterSdk\Core\Request\Timestamp\TimestampFormatterInterface;
use RocketLabs\SellerCenterSdk\Core\Response\Factory;
use RocketLabs\SellerCenterSdk\Core\Response\ResponseInterface;

/**
 * Class SellerCenterApiWorkerClient
 */
class Client
{
    const POST = 'POST';
    const GET = 'GET';

    const ACCEPT_TYPE = 'Accept: application/json';

    /** @var Configuration */
    protected Configuration $configuration;

    /** @var RequestSignatureProviderInterface */
    protected RequestSignatureProviderInterface $signatureProvider;

    /** @var HttpClientInterface */
    protected HttpClientInterface $httpClient;

    /** @var OutputFormatAdapterInterface */
    protected OutputFormatAdapterInterface $requestBodyFormatter;

    /** @var Factory */
    protected Factory $responseFactory;

    /** @var TimestampFormatterInterface */
    protected TimestampFormatterInterface $timestampFormatter;

    /**
     * @param Configuration $configuration
     * @param RequestSignatureProviderInterface $signatureProvider
     * @param OutputFormatAdapterInterface $outputFormatAdapter
     * @param TimestampFormatterInterface $timestampFormatter
     * @param HttpClientInterface $httpClient
     * @param Factory $factory
     */
    public function __construct(
        Configuration $configuration,
        RequestSignatureProviderInterface $signatureProvider,
        OutputFormatAdapterInterface $outputFormatAdapter,
        TimestampFormatterInterface $timestampFormatter,
        HttpClientInterface $httpClient,
        Factory $factory
    ) {
        $this->configuration = $configuration;
        $this->signatureProvider = $signatureProvider;
        $this->requestBodyFormatter = $outputFormatAdapter;
        $this->timestampFormatter = $timestampFormatter;
        $this->responseFactory = $factory;
        $this->httpClient = $httpClient;
    }

    /**
     * @param Configuration $configuration
     * @param ?HttpClientInterface $httpClient
     *
     * @return Client
     */
    public static function create(Configuration $configuration, HttpClientInterface $httpClient = null): Client
    {
        return new static(
            $configuration,
            new HashHmacRequestSignature('sha256', $configuration->getKey()),
            new XmlOutputFormatAdapter(),
            new TimestampFormatter(),
            $httpClient ?: new GuzzleClientAdapter(),
            new Factory()
        );
    }

    /**
     * @param RequestInterface $request
     *
     * @return ResponseInterface
     */
    public function call(RequestInterface $request): ResponseInterface
    {
        $httpRequest = new Request(
            $request->getMethod(),
            $this->buildUrl($request),
            [self::ACCEPT_TYPE],
            $request->getMethod() == Client::POST && !empty($request->getBodyData()) ?
                $this->requestBodyFormatter->convertToOutputFormat($request->getBodyData()) : null
        );

        $httpResponse = $this->httpClient->send($httpRequest);

        return $this->responseFactory->buildResponse($httpResponse, $request->getResponseClassName());
    }

    /**
     * Creates signature for GET request parameters and adds it to request
     *
     * @param array $parameters
     *
     * @return string
     */
    protected function createSignatureForRequest(array $parameters): string
    {
        ksort($parameters);
        $queryString = http_build_query($parameters, '', '&', PHP_QUERY_RFC3986);

        return $this->signatureProvider->sign($queryString);
    }

    /**
     * @param RequestInterface $request
     * @return string
     */
    protected function buildUrl(RequestInterface $request): string
    {
        $parameters = $request->toArray();
        $parameters[RequestInterface::FIELD_USER_ID] = $this->configuration->getUser();
        $parameters[RequestInterface::FIELD_TIMESTAMP] = $this->timestampFormatter->getFormattedTimestamp();
        $parameters[RequestInterface::FIELD_SIGNATURE] = $this->createSignatureForRequest($parameters);

        return
            $this->configuration->getUrl() . '?' . http_build_query(
                $parameters,
                '',
                '&',
                PHP_QUERY_RFC3986
            );
    }

    /**
     * @return string
     */
    public function getUser(): string
    {
        return $this->configuration->getUser();
    }

    /**
     * @return string
     */
    public function getKey(): string
    {
        return $this->configuration->getKey();
    }
}
