<?php

include_once ROOT . "/models/News.php";

class NewsController
{
    public function actionIndex()
    {
        $newsList = [];
        $newsList = News::getNewsList();

        print_r($newsList);
        return true;
    }

    public function actionView($category, $id)
    {
        echo 'Просмотр одной новости';
        var_dump($category);
        var_dump($id);
        return true;
    }
}