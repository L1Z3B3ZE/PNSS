<?php

if (!app()->auth::checkRole()):
    ?>
    <div class="employee_content">
        <div class="employee_title_menu">
            <h3>Врачи</h3>
            <a href="<?= app()->route->getUrl('/addDoctor') ?>" class="link"><button class="add_employee_button">Добавить врача</button></a>
        </div>
        <div class="filter">
            <form method="get" action="<?= app()->route->getUrl('/doctors') ?>">
                <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
                <select class="patients_filter" name="patient_id">
                    <option label="Пациенты" selected></option>
                    <?php foreach ($patients as $patient): ?>
                        <option class="patient_value"
                                value="<?= $patient->id ?>" <?= $patient->id == $searchPatientId ? 'selected' : '' ?>><?= $patient->surname . ' ' . $patient->name . ' ' . $patient->patronymic ?></option>
                    <?php endforeach; ?>
                </select>
                <button class="search_button" type="submit">Поиск</button>
            </form>
        </div>

        <?php
        foreach ($doctors as $doctor) {
            $specialties = $doctor->specialties;
            $positions = $doctor->positions;
            echo "<div class='doctors_list'>";
            echo "<div class='doctor_FIO'>";
            echo "<p class='doctor_FIO'>$doctor->surname $doctor->name $doctor->patronymic</p>";
            echo "</div>";
            foreach ($specialties as $specialty) {
                echo "<p>$specialty->specialty</p>";
            }
            foreach ($positions as $position) {
                echo "<p>$position->position</p>";
            }
            echo "</div>";
        }
        ?>
        <?php if (isset($message)): ?>
            <p><?= $message ?></p>
        <?php endif; ?>

    </div>
<?php

else:
    ?>
    <p>not admin start page</p>
<?php
endif;
?>