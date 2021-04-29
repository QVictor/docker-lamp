<?php include_once ROOT . '/views/layouts/main.php'; ?>
<link rel="stylesheet" href="/views/user/style.css">

<article id="mainArticle">
    <h2>Регистрация на сайте</h2>
    <?php if ($result): ?>
        <p>Вы зарегистрированы!</p>
    <?php else: ?>
        <?php if (isset($errors) && is_array($errors)): ?>
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li> - <?php echo $error; ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>

        <form class="register-form" action="" method="post">
            <input type="text" name="name" value="<?=$name?>" placeholder="Имя"/>
            <input type="email" name="email" value="<?=$email?>" placeholder="E-mail"/>
            <input type="password" name="password" value="<?=$password?>"placeholder="Пароль"/>
            <input type="submit" name="submit" placeholder="Регистрация"/>
        </form>

    <?php endif; ?>


</article>
