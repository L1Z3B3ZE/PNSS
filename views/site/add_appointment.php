<?php

if (!app()->auth::checkRole()):
    ?>
    <div class="add_appointment_content">
        <form method="post" class="add_appointment_form">
            <h2 class="add_form_title">Запись на прием</h2>
            <div class="patient_info">
                <select class="filter">
                    <option class="patient_value" label="Пациент" value="1" selected></option>
                    <option class="patient_value">Пациент 2</option>
                    <option class="patient_value">Пациент 3</option>
                    <option class="patient_value">Пациент 4</option>
                </select>
                <div class="input-group">
                    <label class="appointment_form_label">Дата рождения</label>
                    <input class="add_input" type="date" name="birth_date">
                </div>
            </div>
            <select class="doctor_filter">
                <option class="patient_value" label="ФИО Врача" value="1" selected></option>
                <option class="patient_value">ФИО Врача 1</option>
                <option class="patient_value">ФИО Врача 2</option>
                <option class="patient_value">ФИО Врача 3</option>
            </select>
            <div class="date_time_appointment">
                <div class="input-group">
                    <label class="add_form_label">Дата записи</label>
                    <input class="add_input" type="date" name="appointment_date">
                </div>
                <div class="input-group">
                    <label class="add_form_label">Время записи</label>
                    <input class="add_input" type="time" name="appointment_time">
                </div>
            </div>
            <div class="button_container">
                <button class="button_add_appointment">Записать пациента</button>
            </div>
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
