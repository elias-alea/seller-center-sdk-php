<?php

namespace RocketLabs\SellerCenterSdk\Endpoint\Product\Model;

use DateTimeInterface;
use RocketLabs\SellerCenterSdk\Core\Model\ModelAbstract;

/**
 * Class Product
 */
class Product extends ModelAbstract
{
    const SELLER_SKU = 'SellerSku';
    const SHOP_SKU = 'ShopSku';
    const NAME = 'Name';
    const BRAND = 'Brand';
    const DESCRIPTION = 'Description';
    const TAX_CLASS = 'TaxClass';
    const VARIATION = 'Variation';
    const PARENT_SKU = 'ParentSku';
    const QUANTITY = 'Quantity';
    const FULFILLMENT_BY_NON_SELLABLE = 'FulfillmentByNonSellable';
    const AVAILABLE = 'Available';
    const PRICE = 'Price';
    const SALE_PRICE = 'SalePrice';
    const SALE_START_DATE = 'SaleStartDate';
    const SALE_END_DATE = 'SaleEndDate';
    const STATUS = 'Status';
    const PRODUCT_ID = 'ProductId';
    const URL = 'Url';
    const MAIN_IMAGE = 'MainImage';
    const IMAGES = 'Images';
    const PRIMARY_CATEGORY = 'PrimaryCategory';
    const PRIMARY_CATEGORY_ID = 'PrimaryCategoryId';
    const PACKAGE_CONTENT = 'PackageContent';
    const SHELF_LIFE_MANAGED = 'ShelfLifeManaged';
    const CATEGORIES = 'Categories';
    const PRODUCT_DATA = 'ProductData';
    const BROWSE_NODES = 'BrowseNodes';
    const SHIPMENT_TYPE = 'ShipmentType';
    const CONDITION = 'Condition';

    /**
     * @var array
     */
    protected array $fieldDefinition = [
        self::SELLER_SKU => self::TYPE_STRING,
        self::SHOP_SKU => self::TYPE_STRING,
        self::NAME => self::TYPE_STRING,
        self::BRAND => self::TYPE_STRING,
        self::DESCRIPTION => self::TYPE_STRING,
        self::TAX_CLASS => self::TYPE_STRING,
        self::VARIATION => self::TYPE_STRING,
        self::PARENT_SKU => self::TYPE_STRING,
        self::QUANTITY => self::TYPE_INT,
        self::FULFILLMENT_BY_NON_SELLABLE => self::TYPE_STRING,
        self::AVAILABLE => self::TYPE_STRING,
        self::PRICE => self::TYPE_FLOAT,
        self::SALE_PRICE => self::TYPE_FLOAT,
        self::SALE_START_DATE => self::TYPE_DATETIME,
        self::SALE_END_DATE => self::TYPE_DATETIME,
        self::STATUS => self::TYPE_STRING,
        self::PRODUCT_ID => self::TYPE_STRING,
        self::URL => self::TYPE_STRING,
        self::MAIN_IMAGE => self::TYPE_MIXED,
        self::IMAGES => self::TYPE_STRING,
        self::PRIMARY_CATEGORY => self::TYPE_STRING,
        self::PRIMARY_CATEGORY_ID => self::TYPE_STRING,
        self::PACKAGE_CONTENT => self::TYPE_STRING,
        self::SHELF_LIFE_MANAGED => self::TYPE_STRING,
        self::CATEGORIES => self::TYPE_STRING,
        self::PRODUCT_DATA => self::TYPE_STRING,
    ];

    /**
     * @return string
     */
    public function getSellerSku(): string
    {
        return $this->get($this->data, self::SELLER_SKU);
    }

    /**
     * @return string
     */
    public function getShopSku(): string
    {
        return $this->get($this->data, self::SHOP_SKU);
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->get($this->data, self::NAME);
    }

    /**
     * @return string
     */
    public function getBrand(): string
    {
        return $this->get($this->data, self::BRAND);
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->get($this->data, self::DESCRIPTION);
    }

    /**
     * @return string
     */
    public function getTaxClass(): string
    {
        return $this->get($this->data, self::TAX_CLASS);
    }

    /**
     * @return string
     */
    public function getVariation(): ?string
    {
        return $this->get($this->data, self::VARIATION);
    }

    /**
     * @return string
     */
    public function getParentSku(): string
    {
        return $this->get($this->data, self::PARENT_SKU);
    }

    /**
     * @return string
     */
    public function getQuantity(): string
    {
        return $this->get($this->data, self::QUANTITY);
    }

    /**
     * @return string
     */
    public function getFulfillmentByNonSellable(): ?string
    {
        return $this->get($this->data, self::FULFILLMENT_BY_NON_SELLABLE);
    }

    /**
     * @return string
     */
    public function getAvailable(): string
    {
        return $this->get($this->data, self::AVAILABLE);
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->get($this->data, self::PRICE);
    }

    /**
     * @return float
     */
    public function getSalePrice(): ?float
    {
        return $this->get($this->data, self::SALE_PRICE);
    }

    /**
     * @return DateTimeInterface
     */
    public function getSaleStartDate(): ?DateTimeInterface
    {
        return $this->get($this->data, self::SALE_START_DATE);
    }

    /**
     * @return DateTimeInterface
     */
    public function getSaleEndDate(): ?DateTimeInterface
    {
        return $this->get($this->data, self::SALE_END_DATE);
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->get($this->data, self::STATUS);
    }

    /**
     * @return ?string
     */
    public function getProductId(): ?string
    {
        return $this->get($this->data, self::PRODUCT_ID);
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->get($this->data, self::URL);
    }

    /**
     * @return string
     */
    public function getMainImage(): string
    {
        return $this->get($this->data, self::MAIN_IMAGE);
    }

    /**
     * @return array
     */
    public function getImages(): array
    {
        return $this->get($this->data, self::IMAGES);
    }

    /**
     * @return string
     */
    public function getPrimaryCategory(): string
    {
        return $this->get($this->data, self::PRIMARY_CATEGORY);
    }

    /**
     * @return string
     */
    public function getCategories(): ?string
    {
        return $this->get($this->data, self::CATEGORIES);
    }

    /**
     * @return string
     */
    public function getProductData(): array
    {
        return $this->get($this->data, self::PRODUCT_DATA);
    }

    /**
     * @return string
     */
    public function getPrimaryCategoryId(): string
    {
        return $this->get($this->data, self::PRIMARY_CATEGORY_ID);
    }

    /**
     * @return string
     */
    public function getPackageContent(): ?string
    {
        return $this->get($this->data, self::PACKAGE_CONTENT);
    }

    /**
     * @return string
     */
    public function getShelfLifeManaged(): ?string
    {
        return $this->get($this->data, self::SHELF_LIFE_MANAGED);
    }

}
