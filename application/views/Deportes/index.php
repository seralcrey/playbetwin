

<?php template_set('title', 'Mostrar deporte') ?>

<h1>Mostrar deporte</h1>
<table border="1"
       class="table table-striped table-bordered table-hover table-condensed">
    <thead>
    <th>Nombre</th>
    <th>Descripción</th>
    <th colspan="2">Acciones</th>
</thead>
<tbody>
    <?php foreach ($filas as $fila): ?>
        <tr>
            <td><?= $fila['nombre'] ?></td>
            <td align="center">
                <?= anchor('/deportes/editar/' . $fila['id'], 'Editar', 'class="editar"') ?>
            </td>
            <td align="center">
                <?= anchor('/deportes/borrar/' . $fila['id'], 'Borrar', 'class="borrar "') ?>
            </td>
        </tr>
    <?php endforeach ?>
</tbody>
</table>

<?= anchor('/deportes/insertar/', 'Insertar', 'class="insertar"') ?>