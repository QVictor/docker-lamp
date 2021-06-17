<?php

class Cart
{
    public static function addProduct($idProduct)
    {
        if (!isset($_SESSION['basket'][$idProduct])) {
            $_SESSION['basket'][$idProduct]['count'] = 1;
        } else {
            $_SESSION['basket'][$idProduct]['count']++;
        }
    }

    public static function getCountProducts()
    {
        $countProducts = 0;
        foreach ($_SESSION['basket'] as $count) {
            $countProducts += (int)$count['count'];
        }
        return $countProducts;
    }
}