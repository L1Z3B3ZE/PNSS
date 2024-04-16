<div class="employee_content">
    <div class="employee_title_menu">
        <h3>Записи на прием</h3>
        <a href="<?= app()->route->getUrl('/addAppointment') ?>" class="link"><button class="add_employee_button">Добавить запись на прием</button></a>
    </div>
    <div class="appointment_filter">
        <form class="appointment_filter" action="<?= app()->route->getUrl('/appointments') ?>" method="get">
            <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
            <select name="doctor_id" class="doctor_filter">
                <option value="">Все врачи</option>
                <?php foreach ($doctors as $doctor_id => $doctor): ?>
                    <?php $selected = ($_GET['doctor_id'] == $doctor_id) ? 'selected' : ''; ?>
                    <option value="<?= $doctor_id ?>" <?= $selected ?>><?= $doctor['surname'] . ' ' . $doctor['name'] . ' ' . $doctor['patronymic'] ?></option>
                <?php endforeach; ?>
            </select>
            <div class="input-group">
                <label class="add_form_label">Дата приема</label>
                <input class="appointment_date" type="date" name="appointment_date" value="<?= $_GET['appointment_date'] ?? '' ?>">
            </div>
            <button class="search_button">Поиск</button>
        </form>
    </div>

    <div class="appointment_labels_patient">
        <p>ФИО пациента</br>дата рождения</p>
        <p>ФИО врача</br>время приема</br>статус приема</p>
    </div>
    <ol>
        <?php foreach ($appointments as $appointment): ?>
            <div class="appointments_list">
                <div class="patient_data">
                    <p class="patient_FIO"><?= $patients[$appointment->patient_id]['surname'] . ' ' . $patients[$appointment->patient_id]['name'] . ' ' . $patients[$appointment->patient_id]['patronymic'] ?></p>
                    <p class="patient_birthDate"><?= $patients[$appointment->patient_id]['birth_date'] ?></p>
                </div>
                <div class="appointment_data">
                    <p class="doctor_FIO"><?= $doctors[$appointment->doctor_id]['surname'] . ' ' . $doctors[$appointment->doctor_id]['name'] . ' ' . $doctors[$appointment->doctor_id]['patronymic'] ?></p>
                    <p class="appointments_date"><?= $appointment->appointment_time ?></p>
                    <p class="patient_birthDate"><?= $statuses[$appointment->status_id]['status'] ?></p>
                </div>
                <a href="<?= app()->route->getUrl('/cancelAppointment/' . $appointment->id) ?>" class="link"><button class="edit_patient_info">Отменить запись</button></a>
            </div>
        <?php endforeach; ?>
    </ol>

</div>
