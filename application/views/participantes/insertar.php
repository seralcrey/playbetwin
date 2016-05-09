<?php template_set('title', 'Insertar un participantes') ?>



<?php if (count(error_array()) > 0): ?>
    <div class="alerta">
        <?= validation_errors() ?>
    </div>
<?php endif ?>
<?= form_open('participantes/insertar') ?>
<?= form_label('nombre:', 'nombre') ?>
<?= form_input('nombre', set_value('nombre', '', FALSE), 'id="nombre" class=""') ?>
<select name="id_deporte">
    <?php foreach ($filas as $fila): ?>
        <option value=<?= $fila['id'].'>'. $fila['nombre'] ?></option>
    <?php endforeach ?>
</select>
<?= form_submit('insertar', 'Insertar', 'class=""') ?>
<?= anchor('/participantes/index', 'Cancelar', 'class=""') ?>
<?= form_close() ?>
     
