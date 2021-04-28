<?php
require_once ROOT . '/models/Product.php';
require_once ROOT . '/controllers/CategoriesController.php';

class SiteController
{
    public function actionIndex()
    {

        $productsList = array();
        $productsList = Product::getLatestProducts();

        require_once(ROOT . '/views/site/index.php');
        return true;
    }
}