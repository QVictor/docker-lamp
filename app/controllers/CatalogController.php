<?php
require_once ROOT . '/models/Categories.php';

class CatalogController
{
    public function actionCategory($categoryId, $pageId)
    {
        $categories = array();

        $productsList = Categories::getProductsListByCategoryId($categoryId, $pageId);

        require_once(ROOT . '/views/catalog/index.php');
        return true;
    }
}