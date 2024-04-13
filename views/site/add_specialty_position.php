<?php

if (!app()->auth::checkRole()):
    ?>
    <div class="add_employee_content">
        <form method="post" class="add_position_specialty_form">
            <div class="input-group">
                <input type="hidden" name="doctor_id" value="<?= $_SESSION['doctor_id'] ?? '' ?>">
            </div>
            <div class="input-group">
                <label class="doctor_label">Должность</label>
                <select class="position_filter" name="position_id">
                    <?php
                    foreach ($positions as $position){
                        echo "<option value='$position->id'>$position->position</option>";
                    }
                    ?>

                </select>
            </div>
            <div class="input-group">
                <label class="doctor_label">Специальность</label>
                <select class="position_filter" name="specialty_id">
                    <?php
                    foreach ($specialties as $specialty){
                        echo "<option value='$specialty->id'>$specialty->specialty</option>";
                    }
                    ?>

                </select>
            </div>
            <button class="button_add_doctor">Добавить</button>
        </form>
    </div>
<?php

else:
    ?>
    <p>У вас нет прав</p>
<?php
endif;
?>
</div>
