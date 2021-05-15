<?php include_once ROOT . '/views/layouts/main.php'; ?>
<link rel="stylesheet" href="/views/user/style.css">

<article id="mainArticle">
    <?php if (isset($result) && $result): ?>
        <p>Вы зарегистрированы!</p>
    <?php else: ?>
        <?php if (isset($errors) && is_array($errors)): ?>
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li> - <?php echo $error; ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>

        <form class="form" action="" method="post">
            <input type="email" name="email" value="<?=$email?>" placeholder="E-mail"/>
            <input type="password" name="password" value="<?=$password?>"placeholder="Пароль"/>
            <input type="submit" name="submit" placeholder="Войти"/>
        </form>

    <?php endif; ?>
</article>
