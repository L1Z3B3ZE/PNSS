<div class="employee_content">
    <div class="employee_title_menu">
        <h3>Пациенты</h3>
        <button class="add_employee_button"><a class="link" href="<?= app()->route->getUrl('/addPatient') ?>">Добавить пациента</a></button>
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
        <div class="FIO">
            <div class="appointments_list">
                <div class="patient_data">
                    <p class="patient_FIO">Иванов Иван Иванович</p>
                    <p class="patient_birthDate">дата рождения</p>
                </div>
                <div class="appointment_data">
                    <p class="doctor_FIO">Петров Петр Петрович</p>
                    <p class="appointments_date">дата приема</p>
                </div>
                <button class="edit_patient_info"><a class="edit_patient_info_link" href="<?= app()->route->getUrl('/editPatient') ?>">Редактировать данные о пациенте</a></button>
            </div>
        </div>

    </ol>
</div>
