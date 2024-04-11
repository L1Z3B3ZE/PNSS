<?php

if (app()->auth::checkRole()):
    ?>
    <div class="admin_content">
        <div class="admin_title">
            <h3>Сотрудники регистратуры</h3>
            <button class="add_employee_button"><a href="<?= app()->route->getUrl('/addEmployee') ?>"
                                                   class="button_add_link">Добавить</a></button>
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
        <img src="/pop-it-mvc/public/media/logo.png" width="200px">
        <h1 class="company_name">POLYCLINIC</h1>
    </div>
    <h3>сотрудник регистратуры</h3>
    <div class="registry_employee_buttons">
        <button class="employee_button"><a class="employee_button_link" href="<?= app()->route->getUrl('/doctors') ?>">Врачи</a>
        </button>
        <button class="employee_button"><a class="employee_button_link" href="<?= app()->route->getUrl('/login') ?>">Записи
                на прием</a></button>
        <button class="employee_button"><a class="employee_button_link" href="<?= app()->route->getUrl('/login') ?>">Пациенты</a>
        </button>
    </div>
</div>

<?php
endif;
?>

