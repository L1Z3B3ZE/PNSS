<?php

if (!app()->auth::checkRole()):
    ?>
    <div class="add_employee_content">
        <?php
        ?>
        <form method="post" class="add_note_form" enctype="multipart/form-data">
            <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
            <h2 class="add_form_title">Добавление записи</h2>
            <div class="input-group">
                <label class="add_form_label">Заголовок</label>
                <input class="add_input" type="text" name="title" placeholder="Заголовок">
            </div>
            <div class="input-group">
                <label class="add_form_label">Фотография</label>
                <input type="file" name="img" accept=".jpg, .jpeg, .png">
            </div>
            <div class="input-group">
                <label class="add_form_label">Описание</label>
                <input class="add_input" type="text" name="description" placeholder="Описание">
            </div>
            <button class="button_add_employee">Создать запись</button>
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
