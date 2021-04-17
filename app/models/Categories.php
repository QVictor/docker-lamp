<?php

class Categories
{
    public static function getCategoriesList()
    {
        $db = Db::getConnection();
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $result = $db->query('SELECT * from category ORDER BY sort_order LIMIT 50');
        $result->setFetchMode(PDO::FETCH_ASSOC);

        $categoryList = $row = $result->fetchAll();
        return $categoryList;
    }
}