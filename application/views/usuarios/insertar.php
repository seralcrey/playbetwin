<?php template_set('title', 'Insertar un usuario') ?>

<?= form_open('usuarios/insertar') ?>
<div>
    <?= form_label('Nombre y apellido:', 'nombre') ?>
    <?= form_input('nombre', set_value('nombre', '', FALSE), 'class=""') ?>
</div>
<div>
    <?= form_label('Nick:', 'nick') ?>
    <?= form_input('nick', set_value('nick', '', FALSE), 'class=""')
    ?>
</div>
<div >
    <?= form_label('Email:', 'email') ?>
    <?=
    form_input(array(
        'type' => 'email',
        'name' => 'email',
        'id' => 'email',
        'value' => set_value('email', '', FALSE),
        'class' => ''
    ))
    ?>
</div>
<div >
    <?= form_label('Contraseña:', 'password') ?>
    <?= form_password('password', '', 'id="password" class=""')
    ?>
</div>
<div>
    <?= form_label('Confirmar contraseña:', 'password_confirm') ?>
    <?= form_password('password_confirm', '', 'id="password_confirm" class=""')
    ?>
</div>
<div >
    <?= form_label('Rol:', 'rol_id') ?>
    <?= form_dropdown('rol_id', $roles, set_value('rol_id'), 'id="password" class=""')
    ?>
</div>
<?= form_submit('insertar', 'Insertar', 'class=""') ?>
<?= anchor('/usuarios/index', 'Cancelar', 'class="" role="button"') ?>
<?= form_close() ?>

