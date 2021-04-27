<?php include ROOT . '/views/layouts/main.php' ?>
<link rel="stylesheet" href="/views/catalog/style.css">
<article id="mainArticle">
    <div class="cart_products">
        <? if ($productsList == []): ?>
            <div>Нет товаров в категории</div>
        <? else: ?>
            <? foreach ($productsList as $product) : ?>
                <div class="cart_product">
                    <div class="code">
                        <?= 'код товара: ' . $product['code'] ?>
                    </div>
                    <div class="is_new">
                        <? if ($product['is_new'] == '1'): ?>
                            <div>Новинка</div>
                        <? endif; ?>
                    </div>
                    <div class="image">
                        <img src="<?= $product['image'] ?>" alt="">
                    </div>
                    <a class="name" href="/product/<?=$product['code']?>">
                        <?= $product['name'] ?>
                    </a>
                    <div class="price">
                        <?= $product['price'] ?> золотых
                    </div>
                </div>
            <? endforeach; ?>
        <? endif ?>
    </div>
</article>