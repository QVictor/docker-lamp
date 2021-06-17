<?php include ROOT . '/views/layouts/main.php' ?>
<script>
    document.body.addEventListener('click', function (event) {
        if (event.target.nodeName == 'BUTTON'
            && event.target.attributes.class.value === 'addToBasket') {
            addToBasket(event);
        }
    });

    async function addToBasket(event) {
        let productId = event.target.attributes.id.value;
        let response = await fetch('/cart/add/' + productId, {
            method: 'POST',
            headers: {
                'Content-Type': 'text/plain;charset=UTF-8'
            },
            body: productId
        });
        let result = await response.text();
        console.log(result);
        document.getElementById('countProductInBasket').innerHTML = result;
    }

    function getCountInBasket() {

        let response = fetch('/cart/getCountProducts');

        if (response.ok) {
            let json = response;
        } else {
            alert("Ошибка HTTP: " + response.status);
        }
    }

    window.onload = async function () {
        let response = await fetch('/cart/getCountProducts');
        let countInBasket = await response.text();
        document.getElementById('countProductInBasket').innerHTML = countInBasket;
    };


</script>
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
                    <a class="name" href="/product/<?= $product['code'] ?>">
                        <?= $product['name'] ?>
                    </a>
                    <div class="price">
                        <?= $product['price'] ?> золотых
                    </div>
                    <div class="toBasket">
                        <button class="addToBasket" id="<?= $product['code'] ?>">
                            В корзину
                        </button>
                    </div>
                </div>
            <? endforeach; ?>
        <? endif ?>
    </div>
    <div class="pagination-area">
        <? if (isset($pagination)) {
            echo $pagination->get();
        } ?>
    </div>
</article>