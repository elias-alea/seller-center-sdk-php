<?php

namespace RocketLabs\SellerCenterSdk\Endpoint\Product\Response;

use Illuminate\Support\Arr;
use RocketLabs\SellerCenterSdk\Core\Response\GenericResponse;
use RocketLabs\SellerCenterSdk\Endpoint\Product\Model\ProductCollection;
use RocketLabs\SellerCenterSdk\Endpoint\Product\Model\Product;

/**
 * Class GetProducts
 */
class GetProducts extends GenericResponse
{
    const PRODUCTS_KEY = 'Products';
    const PRODUCT_KEY = 'Product';

    /**
     * @var ProductCollection
     */
    private $products;

    /**
     * @return ProductCollection
     */
    public function getProducts()
    {
        return $this->products;
    }

    /**
     * @param array $responseData
     */
    protected function processDecodedResponse(array $responseData)
    {
        parent::processDecodedResponse($responseData);

        $this->products = new ProductCollection([]);

        if ($allProducts = Arr::get($this->body, static::PRODUCTS_KEY)) {
            if (Arr::get($allProducts, static::PRODUCT_KEY . '.' . Product::SELLER_SKU)) {
                $products = [ $allProducts[static::PRODUCT_KEY] ];
            } else {
                $products = $allProducts[static::PRODUCT_KEY];
            }
            foreach ($products as $product) {
                $this->products->add(new Product($product));
            }
        }
    }
}
