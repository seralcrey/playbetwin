<?php template_set('title', 'Borrar un usuario') ?>

<?= miga_pan() ?>

<h3>¿Seguro que desea borrar el siguiente usuario?</h3>
<p><?= $nick ?> (<?= $nombre ?>)</p>
<?= form_open('usuarios/borrar') ?>
    <?= form_hidden('id', $id) ?>
    <?= form_submit('borrar', 'Sí') ?>
    <?= anchor('usuarios/index', form_button('no', 'No')) ?>
<?= form_close() ?>
