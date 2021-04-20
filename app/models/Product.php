<?php

class Product {
    const SHOW_BY_DEFAULT = 9;

    public static function getLatestProducts($count = self::SHOW_BY_DEFAULT)
    {
        $count = intval($count);

        $db = Db::getConnection();

        $productsList = array();

        $productsList = $db->query('
        SELECT code, name, price, image, is_new FROM product WHERE status = "1"'
            . ' ORDER BY id DESC '
            . ' LIMIT '. $count);
        $productsList->setFetchMode(PDO::FETCH_ASSOC);
        return $productsList->fetchAll();
    }

    public static function getProductById($id)
    {
        $db = Db::getConnection();

        $productsList = array();

        $productsList = $db->query('
        SELECT code, name, price, image, is_new FROM product WHERE code='.$id.' AND status = "1"'
            . ' ORDER BY id DESC');
        $productsList->setFetchMode(PDO::FETCH_ASSOC);
        return $productsList->fetchAll();
    }
}