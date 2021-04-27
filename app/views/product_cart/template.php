<?php include ROOT . '/views/layouts/main.php' ?>
<link rel="stylesheet" href="/views/product_cart/style.css">

<article id="mainArticle">
    <? foreach ($latestProducts as $product) :?>
        <div class="product">
            <div class="image">
                <img src="<?=$product['image']?>" alt="">
            </div>
            <div class="code">
                <?='код товара: ' . $product['code']?>
            </div>
            <div class="is_new">
                <? if ($product['is_new'] == '1'):?>
                    <div>Новинка</div>
                <?endif;?>
            </div>

            <div class="name">
                <?=$product['name']?>
            </div>
            <div class="price">
                <?=$product['price']?> золотых
            </div>
        </div>
    <?endforeach;?>
</article>