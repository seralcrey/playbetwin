
<h1>¿Desea desactivar el siguiente evento?</h1>
<p><?= $participante_casa . " vs " . $participante_visitante ?></p>
<?= form_open('eventos/desactivar') ?>
    <?= form_hidden('id', $id) ?>
    <?= form_submit('desactivar', 'Sí') ?>
    <?= anchor('eventos/index', form_button('no', 'No')) ?>
<?= form_close() ?>
