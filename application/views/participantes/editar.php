<?php template_set('title', 'Editar un participante') ?>



<div class="panel-body">
    <?php if (!empty(error_array())): ?>
        <div class="alert alert-danger" role="alert">
            <?= validation_errors() ?>
        </div>
    <?php endif ?>
    <?= form_open("participantes/editar/$id") ?>
    <?= form_label('Nombre:', 'nombre') ?>
    <?= form_input('nombre', set_value('nombre', $nombre, FALSE), 'class=""') ?>
    <select name="id_deporte">
        <?php foreach ($filas as $fila):
            if ($fila['id'] != $id_deporte) {
                ?>
                <option value=<?= $fila['id'] . '>' . $fila['nombre'] ?></option>
            <?php } else { ?>
                <option value=<?= $fila['id'] . ' selected >' . $fila['nombre'] ?></option>
            <?php }
        endforeach ?>
    </select>
    <?= form_submit('editar', 'Editar', 'class=""') ?>
<?= anchor('/participantes/index', 'Cancelar', 'class=""') ?>
<?= form_close() ?>
</div>



