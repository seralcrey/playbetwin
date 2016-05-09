<?php template_set('title', 'Editar un deporte') ?>



<div class="panel-body">
    <?php if (!empty(error_array())): ?>
        <div class="alert alert-danger" role="alert">
            <?= validation_errors() ?>
        </div>
    <?php endif ?>
    <?= form_open("publicidades/editar/$id") ?>
    <div>
        <?= form_label('Nombre:', 'nombre') ?>
        <?= form_input('nombre', set_value('nombre', $nombre, FALSE), 'class=""') ?>
    </div>
    <div>
        <?= form_label('URL:', 'nombre') ?>
        <?= form_input('url', set_value('url', $url, FALSE), 'class=""') ?>
    </div>
    <div>
        <?= form_label('Coins:', 'coins') ?>
        <?= form_input('coins', set_value('coins', $coins, FALSE), 'class=""') ?>
    </div>
    <?= form_submit('editar', 'Editar', 'class="btn btn-success"') ?>
    <?= anchor('/publicidades/index', 'Cancelar', 'class="btn btn-danger" role="button"') ?>
    <?= form_close() ?>
</div>



