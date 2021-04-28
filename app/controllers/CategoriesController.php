<?php

include_once ROOT . '/models/Categories.php';
include_once ROOT . '/components/Pagination.php';

class CategoriesController
{
    public function actionIndex()
    {
        $categoriesList = Categories::getCategoriesList();

        return $categoriesList;
    }

    public function actionCategory($categoryId)
    {
        $categories = array();
        $productsList = Categories::getProductsListByCategoryId($categoryId);


        require_once(ROOT . '/views/catalog/index.php');
        return true;
    }
}