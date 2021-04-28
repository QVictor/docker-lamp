<?php
require_once ROOT . '/models/Categories.php';
require_once ROOT . '/controllers/ProductController.php';

class CatalogController
{
    public function actionCategory($categoryId, $pageId)
    {
        $categories = array();

        $productsList = Categories::getProductsListByCategoryId($categoryId, $pageId);

        $total = Product::getTotalProductsInCategory($categoryId);

        // Создаем объект Pagination - постраничная навигация
        $pagination = new Pagination($total, $pageId, Product::SHOW_BY_DEFAULT, 'page-');

        require_once(ROOT . '/views/catalog/index.php');
        return true;
    }
}