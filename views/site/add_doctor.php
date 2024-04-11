<?php

if (!app()->auth::checkRole()):
    ?>
    <div class="add_employee_content">
        <form method="post" class="add_doctor_form">
            <h2 class="add_form_title">Добавление врача</h2>
            <h3 class="message"><?= $message ?? ''; ?></h3>
            <div class="input-group">
                <label class="add_form_label">Имя</label>
                <input class="add_input" type="text" name="name" placeholder="Имя">
            </div>
            <div class="input-group">
                <label class="add_form_label">Фамилия</label>
                <input class="add_input" type="text" name="surname" placeholder="Фамилия">
            </div>
            <div class="input-group">
                <label class="add_form_label">Отчество</label>
                <input class="add_input" type="text" name="patronymic" placeholder="Отчество">
            </div>
            <div class="input-group">
                <label class="add_form_label">Дата рождения</label>
                <input class="add_input" type="date" name="birth_date" placeholder="Дата рождения">
            </div>
            <div class="input-group">
                <select class="position_filter">
                    <option class="position_value" label="Должность" value="1" selected></option>
                    <option class="position_value">Должность 2</option>
                    <option class="position_value">Должность 3</option>
                    <option class="position_value">Должность 4</option>
                </select>
            </div>
            <div class="input-group">
                <select class="specialties_filter">
                    <option class="specialty_value" label="Специальность" value="1" selected></option>
                    <option class="specialty_value">Специальность 2</option>
                    <option class="specialty_value">Специальность 3</option>
                    <option class="specialty_value">Специальность 4</option>
                </select>
            </div>
            <button class="button_add_doctor">Добавить</button>
        </form>
    </div>
<?php

else:
    ?>
    <p>У вас нет прав</p>
<?php
endif;
?>
</div>
