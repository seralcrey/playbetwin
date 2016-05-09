<?php template_set('title', 'Mostrar publicidad') ?>

<table border="1"
       class="table table-striped table-bordered table-hover table-condensed">
    <thead>
    <th>Nombre</th>
    <th>Coins</th>
    <th>Activado</th>
    <th>Logo</th>
    <th colspan="3">Acciones</th>
</thead>
<tbody>
    <?php foreach ($filas as $fila): ?>
        <tr>
            <td><?= $fila['nombre'] ?></td>
            <td><?= $fila['coins'] ?></td>
            <?php if ($fila['activado'] === "f") {?>
                <td>Desactivado</td>
            <?php } else { ?>
                <td>Activado</td>
            <?php } ?>
            <?php if ($fila['imagen'] === "f") {?>
                <td>Sin imagen</td>
            <?php } else { ?>
                <td><?php img(array(
                        'src' => 'publicidad/'.$fila['id'].'.png'
                    )) ?></td>
            <?php } ?>    
            <td>
                <?= anchor('/publicidades/editar/' . $fila['id'], 'Editar', 'class="editar"') ?>
            </td>
            <td>
                <?= anchor('/publicidades/borrar/' . $fila['id'], 'Borrar', 'class="borrar "') ?>
            </td>
            <?php if ($fila['activado'] === "t") {?>
                <td><?= anchor('/publicidades/desactivar/' . $fila['id'], 'Desactivar', 'class="borrar "') ?></td>
            <?php } else { ?>
                <td align="center"><?= anchor('/publicidades/activar/' . $fila['id'], 'activar', 'class="borrar "') ?></td>
            <?php } ?>
        </tr>
    <?php endforeach ?>
</tbody>
</table>

<?= anchor('/publicidades/insertar/', 'Insertar', 'class="insertar"') ?>