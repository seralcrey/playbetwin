<?php template_set('title', 'Subir Foto') ?>


<div >
    <h1>Subir Foto</h1>
</div>
<div>
    <?php if (!empty($error)): ?>
        <div class="alert alert-danger" role="alert">
            <?= $error ?>
        </div>
    <?php endif ?>
    <div>
        <p>Formatos Admitidos: png</p>
        <p>Tamaño Maximo: 200 Kbytes</p>
        <p>Alto Maximo: 300 pixeles</p>
        <p>Ancho Maximo: 300 pixeles</p>
    </div>
    <?= form_open_multipart('usuarios/avatar/' . $id) ?>
    <div class="form-group">
        <?= form_label('Foto:', 'foto') ?>
        <?= form_upload('foto', set_value('foto', '', FALSE), 'id="foto" accept="Images/*" class="form-control"')
        ?>
    </div>
    <?= form_submit('insertar', 'Insertar', 'class="btn btn-success"') ?>
    <?= anchor('/usuarios/login', 'Volver', 'class="btn btn-info" role="button"') ?>
    <?= form_close() ?>
</div>
