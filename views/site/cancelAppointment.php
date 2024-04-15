<?php

if (!app()->auth::checkRole()):
    ?>
    <div class="cancel_content">
        <h1>Вы уверены, что хотите отменить запись?</h1>
        <div class="cancel_buttons">
            <form method="POST" action="<?= app()->route->getUrl('/cancelAppointment/' . $appointment->id) ?>">
                <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
                <button type="submit" class="cancel_button">Да</button>
            </form>
            <button class="cancel_button"><a href="<?= app()->route->getUrl('/appointments') ?>"
                                             class="link">Назад</a></button>
        </div>
    </div>

<?php

else:
    ?>
    <p>not admin start page</p>
<?php
endif;
?>