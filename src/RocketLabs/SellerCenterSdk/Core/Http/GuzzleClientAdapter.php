<?php

namespace RocketLabs\SellerCenterSdk\Core\Http;

use Closure;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\RequestInterface;
use GuzzleHttp\Client as HttpClient;
use Psr\Http\Message\ResponseInterface;

class GuzzleClientAdapter implements ClientInterface
{
    /**
     * @var HttpClient
     */
    private HttpClient $guzzleClient;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->guzzleClient = new HttpClient();
    }

    /**
     * @inheritdoc
     * @throws GuzzleException
     */
    public function send(RequestInterface $request, array $options = [], Closure $expectationsLogCallBack = null): ResponseInterface
    {
        if ($expectationsLogCallBack) {
            $expectationsLogCallBack([
                'method' => $request->getMethod(),
                'scheme' => $request->getUri()->getScheme(),
                'host' => $request->getUri()->getHost(),
                'target' => $request->getRequestTarget(),
            ]);
        }

        return $this->guzzleClient->send($request, $options);
    }
}
