<?php include ROOT . '/views/layouts/main.php' ?>
<article id="mainArticle">
    <h2>Личный кабинет</h2>
    <?='Привет, '. $user['name'];?>
    <a href="/cabinet/edit/">Изменить данные</a>
</article>

