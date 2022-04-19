<?php

namespace Grayloon\Magento\Api;

class Categories extends AbstractApi
{
    /**
     * The list of categories.
     *
     * @param  int  $pageSize
     * @param  int  $currentPage
     * @return \Illuminate\Http\Client\Response
     */
    public function all($pageSize = 50, $currentPage = 1)
    {
        return $this->get('/categories/list', [
            'searchCriteria[pageSize]'    => $pageSize,
            'searchCriteria[currentPage]' => $currentPage,
        ]);
    }

    /**
     * Get products assigned to category.
     *
     * @param  int  $categoryId
     * @return \Illuminate\Http\Client\Response
     */
    public function products($categoryId)
    {
        $this->validateSingleStoreCode();

        return $this->get('/categories/'.$categoryId.'/products');
    }

    /**
     * create category
     * @param array $body
     * @return \Illuminate\Http\Client\Response
     */
    public function create($body)
    {
        return $this->post('/categories/', [
           'category' => $body
        ]);
    }

    /**
     * @param $category_id
     * @param $depth
     * @return \Illuminate\Http\Client\Response
     */
    public function children($category_id, $depth)
    {
        return $this->get('/categories/', [
            'depth' => $depth,
            'rootCategoryId' => $category_id
        ]);
    }
}
