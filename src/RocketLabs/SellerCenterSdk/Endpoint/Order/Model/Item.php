<?php

namespace RocketLabs\SellerCenterSdk\Endpoint\Order\Model;

use DateTimeInterface;
use RocketLabs\SellerCenterSdk\Core\Model\ModelAbstract;

/**
 * Class Item
 */
class Item extends ModelAbstract
{
    const ORDER_ITEM_ID = 'OrderItemId';
    const SHOP_ID = 'ShopId';
    const ORDER_ID = 'OrderId';
    const NAME = 'Name';
    const SKU = 'Sku';
    const SHOP_SKU = 'ShopSku';
    const SHIPPING_TYPE = 'ShippingType';
    const ITEM_PRICE = 'ItemPrice';
    const PAID_PRICE = 'PaidPrice';
    const WALLET_CREDITS = 'WalletCredits';
    const TAX_AMOUNT = 'TaxAmount';
    const SHIPPING_AMOUNT = 'ShippingAmount';
    const VOUCHER_AMOUNT = 'VoucherAmount';
    const VOUCHER_CODE = 'VoucherCode';
    const STATUS = 'Status';
    const SHIPMENT_PROVIDER = 'ShipmentProvider';
    const IS_DIGITAL = 'IsDigital';
    const DIGITAL_DELIVERY_INFO = 'DigitalDeliveryInfo';
    const TRACKING_CODE = 'TrackingCode';
    const REASON = 'Reason';
    const REASON_DETAIL = 'ReasonDetail';
    const PURCHASE_ORDER_ID = 'PurchaseOrderId';
    const PURCHASE_ORDER_NUMBER = 'PurchaseOrderNumber';
    const PACKAGE_ID = 'PackageId';
    const SHIPPING_PROVIDER_TYPE = 'ShippingProviderType';
    const EXTRA_ATTRIBUTES = 'ExtraAttributes';
    const CREATED_AT = 'CreatedAt';
    const UPDATED_AT = 'UpdatedAt';
    const VARIATION = 'Variation';
    const SHIPMENT_METHOD = 'ShipmentMethod';
    const CURRENCY = 'Currency';
    const COD_COLLECTABLE_AMOUNT = 'CodCollectableAmount';
    const SHIPPING_SERVICE_COST = 'ShippingServiceCost';
    const IS_PROCESSABLE = 'isProcessable';
    const TRACKING_CODE_PRE = 'TrackingCodePre';
    const PROMISED_SHIPPING_TIME = 'PromisedShippingTime';
    const RETURN_STATUS = 'ReturnStatus';

    /**
     * @var array
     */
    protected array $fieldDefinition = [
        self::ORDER_ITEM_ID => self::TYPE_INT,
        self::SHOP_ID => self::TYPE_INT,
        self::ORDER_ID => self::TYPE_INT,
        self::NAME => self::TYPE_STRING,
        self::SKU => self::TYPE_STRING,
        self::SHOP_SKU => self::TYPE_STRING,
        self::SHIPPING_TYPE => self::TYPE_STRING,
        self::ITEM_PRICE => self::TYPE_STRING,
        self::PAID_PRICE => self::TYPE_STRING,
        self::WALLET_CREDITS => self::TYPE_STRING,
        self::TAX_AMOUNT => self::TYPE_STRING,
        self::SHIPPING_AMOUNT => self::TYPE_STRING,
        self::VOUCHER_AMOUNT => self::TYPE_STRING,
        self::VOUCHER_CODE => self::TYPE_STRING,
        self::STATUS => self::TYPE_STRING,
        self::SHIPMENT_PROVIDER => self::TYPE_STRING,
        self::IS_DIGITAL => self::TYPE_BOOL,
        self::DIGITAL_DELIVERY_INFO => self::TYPE_STRING,
        self::TRACKING_CODE => self::TYPE_STRING,
        self::REASON => self::TYPE_STRING,
        self::REASON_DETAIL => self::TYPE_STRING,
        self::PURCHASE_ORDER_ID => self::TYPE_INT,
        self::PURCHASE_ORDER_NUMBER => self::TYPE_STRING,
        self::PACKAGE_ID => self::TYPE_STRING,
        self::SHIPPING_PROVIDER_TYPE => self::TYPE_STRING,
        self::EXTRA_ATTRIBUTES => self::TYPE_STRING,
        self::CREATED_AT => self::TYPE_DATETIME,
        self::UPDATED_AT => self::TYPE_DATETIME,
        self::VARIATION => self::TYPE_STRING,
        self::SHIPMENT_METHOD => self::TYPE_STRING,
        self::CURRENCY => self::TYPE_STRING,
        self::COD_COLLECTABLE_AMOUNT => self::TYPE_STRING,
        self::SHIPPING_SERVICE_COST => self::TYPE_STRING,
        self::IS_PROCESSABLE => self::TYPE_STRING,
        self::TRACKING_CODE_PRE => self::TYPE_STRING,
        self::PROMISED_SHIPPING_TIME => self::TYPE_STRING,
        self::RETURN_STATUS => self::TYPE_STRING,
    ];

    /**
     * @return int
     */
    public function getOrderItemId(): int
    {
        return $this->get($this->data, self::ORDER_ITEM_ID);
    }

    /**
     * @return int
     */
    public function getShopId(): int
    {
        return $this->get($this->data, self::SHOP_ID);
    }

    /**
     * @return int
     */
    public function getOrderId(): int
    {
        return $this->get($this->data, self::ORDER_ID);
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->get($this->data, self::NAME, '');
    }

    /**
     * @return string
     */
    public function getSku(): string
    {
        return $this->get($this->data, self::SKU, '');
    }

    /**
     * @return string
     */
    public function getShopSku(): string
    {
        return $this->get($this->data, self::SHOP_SKU, '');
    }

    /**
     * @return string
     */
    public function getShippingType(): string
    {
        return $this->get($this->data, self::SHIPPING_TYPE, '');
    }

    /**
     * @return string
     */
    public function getItemPrice(): string
    {
        return $this->get($this->data, self::ITEM_PRICE, '');
    }

    /**
     * @return string
     */
    public function getPaidPrice(): string
    {
        return $this->get($this->data, self::PAID_PRICE, '');
    }

    /**
     * @return string
     */
    public function getWalletCredits(): string
    {
        return $this->get($this->data, self::WALLET_CREDITS, '');
    }

    /**
     * @return string
     */
    public function getTaxAmount(): string
    {
        return $this->get($this->data, self::TAX_AMOUNT, '');
    }

    /**
     * @return string
     */
    public function getShippingAmount(): string
    {
        return $this->get($this->data, self::SHIPPING_AMOUNT, '');
    }

    /**
     * @return string
     */
    public function getVoucherAmount(): string
    {
        return $this->get($this->data, self::VOUCHER_AMOUNT, '');
    }

    /**
     * @return string
     */
    public function getVoucherCode(): ?string
    {
        return $this->get($this->data, self::VOUCHER_CODE, '');
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->get($this->data, self::STATUS, '');
    }

    /**
     * @return string
     */
    public function getShipmentProvider(): ?string
    {
        return $this->get($this->data, self::SHIPMENT_PROVIDER, '');
    }

    /**
     * @return boolean
     */
    public function isDigital(): bool
    {
        return $this->get($this->data, self::IS_DIGITAL);
    }

    /**
     * @return string
     */
    public function getDigitalDeliveryInfo(): ?string
    {
        return $this->get($this->data, self::DIGITAL_DELIVERY_INFO, '');
    }

    /**
     * @return string
     */
    public function getTrackingCode(): ?string
    {
        return $this->get($this->data, self::TRACKING_CODE, '');
    }

    /**
     * @return string
     */
    public function getReason(): ?string
    {
        return $this->get($this->data, self::REASON, '');
    }

    /**
     * @return string
     */
    public function getReasonDetail(): ?string
    {
        return $this->get($this->data, self::REASON_DETAIL, '');
    }

    /**
     * @return int
     */
    public function getPurchaseOrderId(): ?int
    {
        return $this->get($this->data, self::PURCHASE_ORDER_ID);
    }

    /**
     * @return string
     */
    public function getPurchaseOrderNumber(): ?string
    {
        return $this->get($this->data, self::PURCHASE_ORDER_NUMBER, '');
    }

    /**
     * @return string
     */
    public function getPackageId(): ?string
    {
        return $this->get($this->data, self::PACKAGE_ID, '');
    }

    /**
     * @return string
     */
    public function getShippingProviderType(): ?string
    {
        return $this->get($this->data, self::SHIPPING_PROVIDER_TYPE, '');
    }

    /**
     * @return string
     */
    public function getExtraAttributes(): ?string
    {
        return $this->get($this->data, self::EXTRA_ATTRIBUTES, '');
    }

    /**
     * @return DateTimeInterface
     */
    public function getCreatedAt(): DateTimeInterface
    {
        return $this->get($this->data, self::CREATED_AT);
    }

    /**
     * @return DateTimeInterface
     */
    public function getUpdatedAt(): DateTimeInterface
    {
        return $this->get($this->data, self::UPDATED_AT);
    }

    /**
     * @return string
     */
    public function getVariation(): string
    {
        return $this->get($this->data, self::VARIATION, '');
    }

    /**
     * @return string
     */
    public function getShipmentMethod(): string
    {
        return $this->get($this->data, self::SHIPMENT_METHOD, '');
    }

    /**
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->get($this->data, self::CURRENCY, '');
    }

    /**
     * @return string
     */
    public function getCodCollectableAmount(): ?string
    {
        return $this->get($this->data, self::COD_COLLECTABLE_AMOUNT, '');
    }

    /**
     * @return string
     */
    public function getShippingServiceCost(): ?string
    {
        return $this->get($this->data, self::SHIPPING_SERVICE_COST, '');
    }

    /**
     * @return string
     */
    public function isProcessable(): ?string
    {
        return $this->get($this->data, self::IS_PROCESSABLE, '');
    }

    /**
     * @return string
     */
    public function getTrackingCodePre(): ?string
    {
        return $this->get($this->data, self::TRACKING_CODE_PRE, '');
    }

    /**
     * @return string
     */
    public function getPromisedShippingTime(): ?string
    {
        return $this->get($this->data, self::PROMISED_SHIPPING_TIME, '');
    }

    /**
     * @return string
     */
    public function getReturnStatus(): ?string
    {
        return $this->get($this->data, self::RETURN_STATUS, '');
    }

}
