

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
            <td><?= $fila['participante'] ?></td>
            <td><?= $fila['deporte'] ?></td>
            <td align="center">
                <?= anchor('/participantes/editar/' . $fila['id'], 'Editar', 'class="editar"') ?>
            </td>
            <td align="center">
                <?= anchor('/participantes/borrar/' . $fila['id'], 'Borrar', 'class="borrar "') ?>
            </td>
        </tr>
    <?php endforeach ?>
</tbody>
</table>

<?= anchor('/participantes/insertar/', 'Insertar', 'class="insertar"') ?>