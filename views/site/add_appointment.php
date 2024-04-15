<?php

if (!app()->auth::checkRole()):
    ?>
    <div class="add_appointment_content">
        <form method="post" class="add_appointment_form">
            <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>

            <h2 class="add_form_title">Запись на прием</h2>
            <div class="patient_info">
                <select class="patients_filter" name="patient_id">
                    <?php
                    foreach ($patients as $patient){
                        echo "<option value='$patient->id'>$patient->name $patient->surname $patient->patronymic $patient->birth_date</option>";
                    }
                    ?>
                </select>
            </div>
            <select class="doctor_filter" name="doctor_id">
                <?php
                foreach ($doctors as $doctor){
                    echo "<option value='$doctor->id'>$doctor->name $doctor->surname $doctor->patronymic</option>";
                }
                ?>
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
            <input type="hidden" name="employee_id" value="<?php echo app()->auth::user()->id; ?>">
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
