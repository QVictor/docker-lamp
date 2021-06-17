<?php

class CartController
{
    public static function actionAdd($idProduct)
    {
        Cart::addProduct($idProduct);
        echo Cart::getCountProducts();
        return true;
    }

    public static function actionGetCountProducts()
    {
        echo Cart::getCountProducts();
        return true;
    }

}