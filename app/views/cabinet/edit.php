<?php include ROOT . '/views/layouts/main.php' ?>

<article id="mainArticle">
    <?php if (User::isGuest()): ?>
        <? header("Location: /user/login"); ?>
    <?php else: ?>
        <h2>Изменить данные пользователя</h2>
        <?php if (isset($errors) && is_array($errors)): ?>
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li> - <?php echo $error; ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>

        <?if ($result):?>
            <h3 style="color: green">Данные пользователя успешно изменены</h3>
        <?endif;?>

        <form class="form" action="#" method="post">
            <label for="name">Новое имя пользователя</label>
            <input type="name" name="name" value="<? if (isset($name)) : echo $name; endif; ?>" placeholder="Имя пользователя"/>
            <label for="password">Новый пароль</label>
            <input type="password" name="password" value="<? if (isset($password)) : echo $password; endif; ?>"
                   placeholder="Пароль"/>
            <input type="submit" name="submit" value="Изменить данные" placeholder="Войти"/>
        </form>

    <?php endif; ?>
</article>
