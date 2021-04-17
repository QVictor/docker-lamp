<?php

include_once ROOT . '/models/Categories.php';

class CategoriesController
{
    public function actionIndex()
    {
        $categoriesList = Categories::getCategoriesList();

        return $categoriesList;
    }
}