<!doctype html>
<html lang="en">
<head>
    <title>POLYCLINIC</title>
    <link rel="stylesheet" href="/pnss/public/css/style.css">
    <style>

    </style>
</head>
<body>
<header class="header">
    <div class="logoMain">
        <img src="/pnss/public/media/logo.png" width="40px">
        <a class="logo_link" href="<?= app()->route->getUrl('/mainPage') ?>">POLYCLINIC</a>
    </div>
    <?php
    if (!app()->auth::check()):
        ?>
    <?php
    else:
        ?>
        <?php

        if (!app()->auth::checkRole()):
            ?>
            <a class="header_link" href="<?= app()->route->getUrl('/patients') ?>">Пациенты</a>
            <a class="header_link" href="<?= app()->route->getUrl('/doctors') ?>">Врачи</a>
            <a class="header_link" href="<?= app()->route->getUrl('/appointments') ?>">Записи на прием</a>
        <?php
        endif;
        ?>
        <button class="logout_button"><a class="button_link" href="<?= app()->route->getUrl('/logout') ?>">Выход</a></button>
    <?php
    endif;
    ?>

</header>
<main>
    <?= $content ?? '' ?>
</main>

</body>
</html>




