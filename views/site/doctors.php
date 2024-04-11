<?php

if (!app()->auth::checkRole()):
?>
<div class="employee_content">
    <div class="employee_title_menu">
        <h3>Врачи</h3>
        <button class="add_employee_button"><a href="<?= app()->route->getUrl('/addDoctor') ?>"
                                               class="link">Добавить врача</a></button>
    </div>
    <div class="filter">
        <select class="patients_filter">
            <option class="patient_value" label="Пациент" value="1" selected></option>
            <option class="patient_value">Пациент 2</option>
            <option class="patient_value">Пациент 3</option>
            <option class="patient_value">Пациент 4</option>
        </select>
        <button class="search_button">Поиск</button>
    </div>

    <ol>
            <div class="doctors_list">
                <div class="doctor_FIO">
                    <p class="doctor_FIO">Иванов Иван Иванович</p>
                </div>
                <div class="positions_and_specialties">
                    <p class="position">Медицинский директор</p>
                    <p class="specialty">Фармация</p>
                </div>
            </div>

    </ol>
</div>
<?php

else:
    ?>
    <p>not admin start page</p>
<?php
endif;
?>