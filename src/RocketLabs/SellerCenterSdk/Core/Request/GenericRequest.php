<?php

namespace RocketLabs\SellerCenterSdk\Core\Request;

use Closure;
use RocketLabs\SellerCenterSdk\Core\Client;
use RocketLabs\SellerCenterSdk\Core\Response\GenericResponse;
use RocketLabs\SellerCenterSdk\Core\Response\ResponseInterface;

/**
 * Class GenericRequest
 */
class GenericRequest implements RequestInterface
{

    /**
     * @var string
     */
    protected string $method;

    /**
     * @var string
     */
    protected string $action;

    /**
     * @var array
     */
    protected array $query;

    /**
     * @var array
     */
    protected array $body;

    /**
     * @var string
     */
    protected string $version;

    /**
     * GenericRequest constructor.
     * @param string $method
     * @param string $action
     * @param string $version
     * @param array $query
     * @param array $body
     */
    public function __construct(string $method, string $action, string $version, array $query = [], array $body = [])
    {
        $this->method = $method;
        $this->action = $action;
        $this->version = $version;
        $this->query = $query;
        $this->body = $body;
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return $this->method;
    }

    /**
     * @return string
     */
    public function getAction(): string
    {
        return $this->action;
    }

    /**
     * @return array
     */
    public function getBodyData(): array
    {
        return $this->body;
    }

    /**
     * @return string
     */
    public function getVersion(): string
    {
        return $this->version;
    }


    /**
     * @return string[]
     */
    public function toArray(): array
    {
        return [
            static::FIELD_ACTION => $this->getAction(),
            static::FIELD_FORMAT => static::DEFAULT_RESPONSE_FORMAT,
            static::FIELD_VERSION => $this->getVersion(),
        ] + $this->query;
    }

    /**
     * @param Client $client
     * @param Closure|null $expectationsLogCallBack
     * @return ResponseInterface
     */
    public function call(Client $client, Closure $expectationsLogCallBack = null): ResponseInterface
    {
        return $client->call($this, $expectationsLogCallBack);
    }

    /**
     * @return string
     */
    public function getResponseClassName(): string
    {
        return GenericResponse::class;
    }
}
