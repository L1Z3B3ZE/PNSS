<?php

if (app()->auth::checkRole()):
    ?>
    <div class="admin_content">
        <div class="admin_title">
            <h3>Сотрудники регистратуры</h3>
            <a href="<?= app()->route->getUrl('/addEmployee') ?>"
               class="link"><button class="add_employee_button">Добавить</button></a>
        </div>
        <ol>
            <?php
            foreach ($users as $user) {
                echo '<p class="registry_employee">' . $user->name . '</p>';
            }
            ?>
        </ol>
    </div>
<?php

else:
    ?>
<div class="registry_employee_content">
    <div class="logo">
        <img src="/pnss/public/media/logo.png" width="200px">
        <h1 class="company_name">POLYCLINIC</h1>
    </div>
    <h3>сотрудник регистратуры</h3>
    <div class="registry_employee_buttons">
        <a class="employee_button_link" href="<?= app()->route->getUrl('/doctors') ?>"><button class="employee_button">Врачи</button></a>
        <a class="employee_button_link" href="<?= app()->route->getUrl('/appointments') ?>"><button class="employee_button">Записи
                на прием</button></a>
        <a class="employee_button_link" href="<?= app()->route->getUrl('/patients') ?>"><button class="employee_button">Пациенты</button></a>
    </div>

    <a href="<?= app()->route->getUrl('/addNote') ?>"><button class="add_note_button">Добавить статью</button></a>

    <h3 class="notes_text">Статьи:</h3>
    <div class="notes">
        <?php foreach ($notes as $note): ?>
            <div class="notification">
                <h3><?= $note->title ?></h3>
                <p><?= $note->description ?></p>
                <div class="note_image"><img width="200px" src="<?= $note->img ?>" alt="<?= $note->title ?>"></div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php
endif;
?>

