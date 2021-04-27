<? require_once(ROOT . '/controllers/CategoriesController.php') ?>

<?
$categoriesController = new CategoriesController();
$categoriesList = $categoriesController->actionIndex();
?>
<nav id="mainNav">
    <a>Категории:</a>
    <? foreach ($categoriesList as $item) {?>
        <p>
            - <a href="/category/<?=$item['id']?>"
            <?if(isset($categoryId) && $categoryId == $item['id']):?>
                class="active"
            <?endif;?>><?=$item['name']?></a>
        </p>
    <?}?>
</nav>