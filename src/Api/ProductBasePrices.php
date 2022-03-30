<?php

namespace Grayloon\Magento\Api;

use App\Models\Price;

class ProductBasePrices extends AbstractApi
{

    /**
     * Return base prices
     * @param array $skus
     * @return \Illuminate\Http\Client\Response
     */
    public function prices(array $skus)
    {
        return $this->post('/products/base-prices-information', [
           'skus' => $skus
        ]);
    }

    public function updatePrices(array $prices)
    {
        $priceArray = [];
        /** @var Price $price */
        foreach ($prices as $price) {
            $priceArray[] = ['price' => $price->price, 'store_id' => $price->store_id, 'sku' => $price->product->sku];
        }
        return $this->post('/products/base-prices', [
            'prices' => $priceArray
        ]);
    }
}
