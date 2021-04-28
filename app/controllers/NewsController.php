<?php

class NewsController
{
    public function actionIndex()
    {
        $newsList = [];
        $newsList = News::getNewsList();

        require_once (ROOT . '/views/news/index.php');
        return true;
    }

    public function actionView($id)
    {
        $news = News::getNewsItemById($id);

        require_once (ROOT . '/views/news/detail.php');
        return true;
    }
}