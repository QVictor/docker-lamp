<?php

class ProductController
{
    public function actionView($id)
    {
        intval($id);

        $latestProducts = Product::getProductById($id);

        require_once(ROOT . '/views/product_cart/template.php');
        return true;
    }
}