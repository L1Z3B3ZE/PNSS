<!doctype html>
<html lang="en">
<head>
    <title>POLYCLINIC</title>
    <link rel="stylesheet" href="/pop-it-mvc/public/css/style.css">
    <style>

    </style>
</head>
<body>
<header class="header">
    <div class="logoMain">
        <img src="/pop-it-mvc/public/media/logo.png" width="40px">
        <h1>POLYCLINIC</h1>
    </div>
    <?php
    if (!app()->auth::check()):
        ?>
    <?php
    else:
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


