<?php

if (app()->auth::checkRole()):
    ?>
    <div class="add_employee_content">
        <form method="post" class="add_employee_form">
            <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
            <h2 class="add_form_title">Добавление сотрудника регистратуры</h2>

            <div class="input-group">
                <label class="add_form_label">Имя</label>
                <?= isset($errors['name']) ? '<div class="error">' . implode(', ', $errors['name']) . '</div>' : '' ?>
                <input class="add_input" type="text" name="name" placeholder="Имя">
            </div>

            <div class="input-group">
                <label class="add_form_label">Фамилия</label>
                <?= isset($errors['surname']) ? '<div class="error">' . implode(', ', $errors['surname']) . '</div>' : '' ?>
                <input class="add_input" type="text" name="surname" placeholder="Фамилия">
            </div>

            <div class="input-group">
                <label class="add_form_label">Отчество</label>
                <?= isset($errors['patronymic']) ? '<div class="error">' . implode(', ', $errors['patronymic']) . '</div>' : '' ?>
                <input class="add_input" type="text" name="patronymic" placeholder="Отчество">
            </div>

            <div class="input-group">
                <label class="add_form_label">Логин</label>
                <?= isset($errors['login']) ? '<div class="error">' . implode(', ', $errors['login']) . '</div>' : '' ?>
                <input class="add_input" type="text" name="login" placeholder="Логин">
            </div>

            <div class="input-group">
                <label class="add_form_label">Пароль</label>
                <?= isset($errors['password']) ? '<div class="error">' . implode(', ', $errors['password']) . '</div>' : '' ?>
                <input class="add_input" type="text" name="password" placeholder="Пароль">
            </div>

            <button class="button_add_employee">Добавить</button>
        </form>


    </div>
<?php

else:
    ?>
    <p>not admin start page</p>
<?php
endif;
?>
</div>
