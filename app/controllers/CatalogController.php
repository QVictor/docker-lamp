<?php
require_once ROOT . '/models/Categories.php';

class CatalogController
{
    public function actionCategory($categoryId)
    {
        $categories = array();

        $productsList = Categories::getProductsListByCategoryId($categoryId);

        require_once(ROOT . '/views/catalog/catalog.php');
        return true;
    }
}