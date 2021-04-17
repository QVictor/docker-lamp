<? require_once(ROOT . '/controllers/CategoriesController.php') ?>

<?
$categoriesController = new CategoriesController();
$categoriesList = $categoriesController->actionIndex();
?>
<nav id="mainNav">
    <a>Категории:</a>
    <? foreach ($categoriesList as $item) {?>
        <a href="/categories/<?=$item['id']?>"><?=$item['name']?></a>
    <?}?>
</nav>