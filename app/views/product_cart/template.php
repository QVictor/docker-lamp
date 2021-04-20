<?php include ROOT . '/views/layouts/main.php' ?>
<link rel="stylesheet" href="/views/product/style.css">
<link rel="stylesheet" href="/template/css/site.css">
<article id="mainArticle">
    <? foreach ($latestProducts as $product) :?>
        <div class="product">
            <div class="code">
                <?='код товара: ' . $product['code']?>
            </div>
            <div class="is_new">
                <? if ($product['is_new'] == '1'):?>
                    <div>Новинка</div>
                <?endif;?>
            </div>
            <div class="image">
                <img src="<?=$product['image']?>" alt="">
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