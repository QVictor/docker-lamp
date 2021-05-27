<?php

class SiteController
{
    public static function actionIndex()
    {

        $productsList = array();
        $productsList = Product::getLatestProducts();

        require_once(ROOT . '/views/site/index.php');
        return true;
    }
}