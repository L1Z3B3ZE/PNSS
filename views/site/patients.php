<div class="employee_content">
    <div class="employee_title_menu">
        <h3>Пациенты</h3>
        <button class="add_employee_button"><a class="link" href="<?= app()->route->getUrl('/addPatient') ?>">Добавить
                пациента</a></button>
    </div>
    <form action="<?= app()->route->getUrl('/patients') ?>" method="get">
        <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
        <div class="filter">
            <select name="patient_id" class="patients_filter">
                <option value="">Все записи</option>
                <?php
                foreach ($patients as $patient) {
                    $selected = ($_GET['patient_id'] == $patient->id) ? 'selected' : '';
                    echo "<option class='patient_value' value='$patient->id' $selected>$patient->name $patient->surname $patient->patronymic ($patient->birth_date)</option>";
                }
                ?>
            </select>
            <button type="submit" class="search_button">Поиск</button>
        </div>
    </form>
    <button><a href="<?= app()->route->getUrl('/allPatients') ?>">Все пациенты</a></button>
    <div>
        <div class="appointment_labels">
            <p>ФИО пациента/дата рождения</p>
            <p>ФИО врача/дата приема/статус приема</p>
        </div>
        <?php
        foreach ($appointments as $appointment) {
            $statusName = $appointment->status->status;
            $doctorName = $appointment->doctor->name;
            $doctorSurname = $appointment->doctor->surname;
            $doctorPatronymic = $appointment->doctor->patronymic;
            $patientName = $appointment->patient->name;
            $patientSurname = $appointment->patient->surname;
            $patientPatronymic = $appointment->patient->patronymic;
            $patientBirthDate = $appointment->patient->birth_date;
            echo "<div class='patients_appointments_list'>";
                echo "<div class='patient_data'>";
                    echo "<p class='patient_FIO'>$patientName $patientSurname $patientPatronymic</p>";
                    echo "<p class='patient_birthDate'>$patientBirthDate</p>";
                echo "</div>";
                echo "<div class='appointment_data'>";
                    echo "<p class='doctor_FIO'>$doctorSurname $doctorName $doctorPatronymic</p>";
                    echo "<p class='appointments_date'>$appointment->appointment_date</p>";
                    echo "<p class='appointment_status'>$statusName</p>";
                echo "</div>";
            echo "</div>";
        }
        ?>
    </div>


</div>
