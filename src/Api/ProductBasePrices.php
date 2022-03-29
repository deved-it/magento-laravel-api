<?php

namespace Grayloon\Magento\Api;

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
}
