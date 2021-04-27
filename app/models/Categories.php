<?php

class Categories
{
    const SHOW_BY_DEFAULT = 3;

    public static function getCategoriesList()
    {
        $db = Db::getConnection();
        $result = $db->query('SELECT * from category ORDER BY sort_order LIMIT 50');

        $categoryList = $result->fetchAll();
        return $categoryList;
    }

    public static function getProductsListByCategoryId($categoryId, $pageId = 1)
    {
        $db = Db::getConnection();
        $startElement = self::SHOW_BY_DEFAULT * ($pageId - 1);
        $result = $db->query('SELECT * from product WHERE category_id = ' . $categoryId
            . ' LIMIT ' . $startElement . ' , ' . self::SHOW_BY_DEFAULT);
        $categoryList = $result->fetchAll();
        return $categoryList;

    }
}