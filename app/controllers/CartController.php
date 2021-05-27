<?php

class CartController
{
    public static function actionAdd($idProduct)
    {
        if (!isset($_SESSION['basket'][$idProduct])) {
            $_SESSION['basket'][$idProduct]['count'] = 1;
        } else {
            $_SESSION['basket'][$idProduct]['count']++;
        }
        $countProducts = self::getCountProductsInBasket();
        echo $countProducts;
        return true;
    }

    public static function getCountProductsInBasket()
    {
        $countProducts = 0;
        foreach ($_SESSION['basket'] as $count) {
            $countProducts += (int)$count['count'];
        }
        return $countProducts;
    }

    public static function actionGetCountProductsInBasket()
    {
        echo self::getCountProductsInBasket();
        return true;
    }
}