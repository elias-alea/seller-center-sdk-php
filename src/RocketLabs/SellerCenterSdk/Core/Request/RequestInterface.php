<?php
namespace RocketLabs\SellerCenterSdk\Core\Request;
use Closure;
use RocketLabs\SellerCenterSdk\Core\Client;
use RocketLabs\SellerCenterSdk\Core\Response\ResponseInterface;

/**
 * Interface RequestInterface
 */
interface RequestInterface
{
    const FIELD_USER_ID = 'UserID';
    const FIELD_SIGNATURE = 'Signature';
    const FIELD_TIMESTAMP = 'Timestamp';

    const FIELD_ACTION = 'Action';
    const FIELD_VERSION = 'Version';
    const FIELD_FORMAT = 'Format';

    const DEFAULT_RESPONSE_FORMAT = 'JSON';

    const V1 = '1.0';
    const V2 = '2.0';

    /**
     * Seller Center API name
     *
     * @return string
     */
    public function getAction(): string;

    /**
     * @return string
     */
    public function getMethod(): string;

    /**
     * @return null|array
     */
    public function getBodyData(): ?array;

    /**
     * @return string[]
     */
    public function toArray(): array;

    /**
     * @return string
     */
    public function getVersion(): string;

    /**
     * @return string
     */
    public function getResponseClassName(): string;

    /**
     * @param Client $client
     * @param Closure|null $expectationsLogCallBack
     * @return ResponseInterface
     */
    public function call(Client $client, Closure $expectationsLogCallBack = null): ResponseInterface;
}
