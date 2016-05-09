<?php template_set('title', 'Editar un usuario') ?>

<?= validation_errors() ?>
<?= form_open("usuarios/editar/$id") ?>
<div>
    <?= form_label('Nombre y apellido:', 'nombre') ?>
    <?= form_input('nombre', set_value('nombre', $nombre, FALSE), 'class=""') ?>
</div>
<div>
    <?= form_label('Nick:', 'nick') ?>
    <?= form_input('nick', set_value('nick', $nick, FALSE), 'class=""')
    ?>
</div>
<div >
    <?= form_label('Email:', 'email') ?>
    <?=
    form_input(array(
        'type' => 'email',
        'name' => 'email',
        'id' => 'email',
        'value' => set_value('email', $email, FALSE),
        'class' => ''
    ))
    ?>
</div>
<div >
    <?= form_label('Contraseña Antigua:', 'password_anterior') ?>
    <?= form_password('password_anterior', '', 'class=""') ?>
</div>
<div >
    <?= form_label('Contraseña:', 'password') ?>
    <?= form_password('password', '', ' class=""') ?>
</div>
<div>
    <?= form_label('Confirmar Contraseña:', 'password_confirm') ?>
    <?= form_password('password_confirm', '', 'class=""') ?>
</div>
<div>
    <?= form_label('Rol:', 'rol_id') ?>
    <?= form_dropdown('rol_id', $roles, set_value('rol_id', $rol_id, FALSE), 'class=""') ?>
</div>
<?= form_submit('editar', 'Editar', 'class=""') ?>
<?= anchor('/usuarios/index', 'Cancelar', 'class=""')?>
<?= form_close() ?>

