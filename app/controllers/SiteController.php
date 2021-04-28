<?php

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