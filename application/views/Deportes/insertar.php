<?php template_set('title', 'Insertar un deporte') ?>



<h1>Insertar deporte</h1>
<?= form_open('deportes/insertar') ?>
    <?= form_label('nombre:', 'nombre') ?>
    <?= form_input('nombre', set_value('nombre', '', FALSE), 'id="nombre" class=""') ?>
    <?= form_submit('insertar', 'Insertar', 'class=""') ?>
    <?= anchor('/usuarios/index', 'Cancelar', 'class=""') ?>
<?= form_close() ?>
     
