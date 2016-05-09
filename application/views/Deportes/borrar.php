
<h1>¿Seguro que desea borrar el siguiente artículo?</h1>
<p><?= $nombre ?></p>
<?= form_open('deportes/borrar') ?>
    <?= form_hidden('id', $id) ?>
    <?= form_submit('borrar', 'Sí') ?>
    <?= anchor('deportes/index', form_button('no', 'No')) ?>
<?= form_close() ?>
