<?php template_set('title', 'Insertar publicidad') ?>

<h1>Insertar una nueva publicidad</h1>

<?= form_open('publicidades/insertar') ?>
    <div>
        <?= form_label('Nombre:', 'nombre') ?>
        <?= form_input('nombre', set_value('nombre', '', FALSE), 'class=""') ?>
    </div>
    <div>

        <?= form_label('Url:', 'url') ?>
        <?= form_input('url', set_value('url', '', FALSE), ' class=""') ?>
    </div>
    <div>

        <?= form_label('Coins:', 'coins') ?>
        <?= form_input('coins', set_value('coins', '', FALSE), 'class=""') ?>
    </div>
    <div>
        <?= form_submit('insertar', 'Insertar', 'class=""') ?>
        <?= anchor('/publicidades/index', 'Cancelar', 'class=""') ?>
    </div>
<?= form_close() ?>
     
