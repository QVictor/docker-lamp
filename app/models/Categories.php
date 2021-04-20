<?php

class Categories
{
    const SHOW_BY_DEFAULT = 9;

    public static function getCategoriesList()
    {
        $db = Db::getConnection();
        $result = $db->query('SELECT * from category ORDER BY sort_order LIMIT 50');

        $categoryList = $result->fetchAll();
        return $categoryList;
    }

    public static function getProductsListByCategoryId($categoryId)
    {
        $db = Db::getConnection();
        $result = $db->query('SELECT * from product WHERE category_id = ' . $categoryId
            . ' LIMIT ' . self::SHOW_BY_DEFAULT);
        $categoryList = $result->fetchAll();
        return $categoryList;

    }
}