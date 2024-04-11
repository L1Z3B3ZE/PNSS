<?php

if (!app()->auth::checkRole()):
    ?>
    <div class="add_patient_content">
        <form method="post" class="add_patient_form">
            <h2 class="add_form_title">Добавление пациента</h2>
            <div class="input-group">
                <label class="add_form_label">Фамилия</label>
                <input class="add_input" type="text" name="surname" placeholder="Фамилия">
            </div>
            <div class="input-group">
                <label class="add_form_label">Имя</label>
                <input class="add_input" type="text" name="name" placeholder="Имя">
            </div>
            <div class="input-group">
                <label class="add_form_label">Отчество</label>
                <input class="add_input" type="text" name="patronymic" placeholder="Отчество">
            </div>
            <div class="input-group">
                <label class="add_form_label">Дата рождения</label>
                <input class="add_input" type="date" name="login">
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
