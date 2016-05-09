<?php template_set('title', 'Editar un deporte') ?>



<h1>Editar deporte</h1>
<?= form_open("deportes/editar/$id") ?>
<div class="form-group">
    <?= form_label('Nombre:', 'nombre') ?>
    <?= form_input('nombre', set_value('nombre', $nombre, FALSE), 'class=""') ?>
</div>
<?= form_submit('editar', 'Editar', 'class="btn btn-success"') ?>
<?= anchor('/deportes/index', 'Cancelar', 'class="btn btn-danger" role="button"') ?>
<?= form_close() ?>



