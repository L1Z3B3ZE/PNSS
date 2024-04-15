<h3><?= app()->auth->check() ? 'Вы уже вошли на сайт как ' . app()->auth->user()->name : ''; ?></h3>
<?php
if (!app()->auth::check()):
    ?>
    <div class="login_content">
        <form class="login_form" method="post">
            <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
            <h2 class="form_title">Авторизация</h2>

            <div class="input-group">
                <label class="form_label">Логин</label>
                <?= isset($errors['login']) ? '<div class="error">' . implode(', ', $errors['login']) . '</div>' : '' ?>
                <input class="login_input" type="text" name="login">
            </div>

            <div class="input-group">
                <label class="form_label" for="password">Пароль</label>
                <?= isset($errors['password']) ? '<div class="error">' . implode(', ', $errors['password']) . '</div>' : '' ?>
                <input class="login_input" id="password" type="password" name="password">
            </div>

            <button class="authorization_button">ВХОД</button>
        </form>
    </div>

<?php endif;