<?php template_set('title', 'Listado de usuarios') ?>


<table border="1"
       class="table table-striped table-bordered table-hover table-condensed">
    <thead>
    <th>nombre</th>
    <th>Rol</th>
    <th colspan="3">Acciones</th>
</thead>
<tbody>
    <?php foreach ($filas as $fila): ?>
        <tr>
            <td><?= $fila['nombre'] ?></td>
            <td><?= $fila['descripcion'] ?></td>
            <td align="center">
                <?= anchor('/usuarios/borrar/' . $fila['id'], 'Borrar', 'class="btn btn-danger btn-xs" role="button"')
                ?>
            </td>
            <td align="center">
                <?= anchor('/usuarios/editar/' . $fila['id'], 'Editar', 'class="btn btn-warning btn-xs" role="button"')
                ?>
            </td>
            <td align="center">
                <?= anchor('/usuarios/avatar/' . $fila['id'], 'Cambiar avatar', 'class="btn btn-warning btn-xs" role="button"')
                ?>
            </td>
        </tr>
    <?php endforeach ?>
</tbody>
</table>
<p align="center">
    <?= anchor('usuarios/insertar', 'Insertar', 'class="btn btn-success" role="button"')
    ?>
</p>
