<div class="employee_content">
    <div class="employee_title_menu">
        <h3>Записи на прием</h3>
        <button class="add_employee_button"><a href="<?= app()->route->getUrl('/addAppointment') ?>"
                                               class="link">Добавить запись на прием</a></button>
    </div>
    <div class="appointment_filter">
        <select class="doctor_filter">
            <option class="patient_value" label="ФИО Врача" value="1" selected></option>
            <option class="patient_value">ФИО Врача 1</option>
            <option class="patient_value">ФИО Врача 2</option>
            <option class="patient_value">ФИО Врача 3</option>
        </select>
        <div class="input-group">
            <label class="add_form_label">Дата приема</label>
            <input class="appointment_date" type="date" name="appointment_date">
        </div>
        <button class="search_button">Поиск</button>
    </div>

    <ol>
        <div class="appointments_list">
            <div class="patient_data">
                <p class="patient_FIO">Иванов Иван Иванович</p>
                <p class="patient_birthDate">дата рождения</p>
            </div>
            <div class="appointment_data">
                <p class="doctor_FIO">Петров Петр Петрович</p>
                <p class="appointments_date">дата приема</p>
            </div>
            <button class="edit_patient_info"><a href="<?= app()->route->getUrl('/cancelAppointment') ?>"
                                                 class="link"">Отменить
                    запись</a></button>
        </div>
        <div class="appointments_list">
            <?php foreach ($appointments as $appointment): ?>
                <div class="patient_data">
                    <p class="patient_FIO"><?= $patients[$appointment->patient_id]['surname'] . ' ' . $patients[$appointment->patient_id]['name'] . ' ' . $patients[$appointment->patient_id]['patronymic'] ?></p>
                    <p class="patient_birthDate"><?= $patients[$appointment->patient_id]['birth_date'] ?></p>
                </div>
                <div class="appointment_data">
                    <p class="doctor_FIO"><?= $doctors[$appointment->doctor_id]['surname'] . ' ' . $doctors[$appointment->doctor_id]['name'] . ' ' . $doctors[$appointment->doctor_id]['patronymic'] ?></p>
                    <p class="appointments_date"><?= $appointment->appointment_date ?></p>
                    <p class="patient_birthDate"><?= $statuses[$appointment->status_id]['status'] ?></p>
                </div>
                <button class="edit_patient_info">
                    <a href="<?= app()->route->getUrl('/cancelAppointment') ?>" class="link">Отменить запись</a>
                </button>
            <?php endforeach; ?>
        </div>


    </ol>
</div>
