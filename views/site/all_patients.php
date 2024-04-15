<div class="employee_content">
    <div class="employee_title_menu">
        <h3>Пациенты</h3>
    </div>
    <div class="search_form">
        <form action="<?= app()->route->getUrl('/searchPatients') ?>" method="get">
            <input type="text" name="search" required>
            <button type="submit">Поиск</button>
        </form>
    </div>
    <div>
        <?php
        if (isset($message)) {
            echo "<h4 class='error_message'>$message</h4>";
        }else{
            foreach ($patients as $patient) {
            echo "<div class='patients_list'>";
            echo "<div class='patient_data'>";
            echo "<p class='patient_FIO'>$patient->surname $patient->name $patient->patronymic</p>";
            echo "<p class='patient_birthDate'>($patient->birth_date)</p>";
            echo "</div>";
            echo "</div>";
        }}
        ?>
    </div>
</div>
