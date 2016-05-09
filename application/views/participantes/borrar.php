

<?php template_set('title', 'Borrar un participantes') ?>


<h3>¿Seguro que desea borrar el siguiente participante?</h3>
<p><?= "$nombre" ?></p>
<?= form_open('participantes/borrar') ?>
    <?= form_hidden('id', $id) ?>
    <?= form_submit('borrar', 'Sí') ?>
    <?= anchor('participantes/index', form_button('no', 'No')) ?>
<?= form_close() ?>
