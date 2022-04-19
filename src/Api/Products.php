<?php

namespace Grayloon\Magento\Api;

class Products extends AbstractApi
{

    /**
     * The list of Products.
     *
     * @param  int  $pageSize
     * @param  int  $currentPage
     * @return \Illuminate\Http\Client\Response
     */
    public function all($pageSize = 50, $currentPage = 1, $filters = [])
    {
        return $this->get('/products', array_merge($filters, [
            'searchCriteria[pageSize]'    => $pageSize,
            'searchCriteria[currentPage]' => $currentPage,
        ]));
    }

    /**
     * Get info about product by product SKU.
     *
     * @param  string  $sku
     * @return \Illuminate\Http\Client\Response
     */
    public function show($sku)
    {
        return $this->get('/products/'.$sku);
    }

    /**
     * Edit the product by the specified SKU.
     *
     * @param  string  $sku
     * @param  array  $body
     * @return array|\Illuminate\Http\Client\Response|void
     */
    public function edit($sku, $body = [])
    {
        return $this->put('/products/'.$sku, $body);
    }

    public function createAttributesOption($attributeCode, $option)
    {
        return $this->post('/products/attributes/' . $attributeCode . '/options', [
            'option' => $option
        ]);
    }

    public function create($body)
    {
        return $this->post('/products/', [
            "product" => $body
        ]);
    }
}
