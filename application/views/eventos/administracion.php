<?php template_set('title', 'Eventos') ?>

<table border="1"
       class="table table-striped table-bordered table-hover table-condensed">
    <thead>
    <th>Participante Local</th>
    <th>Participante Visitante</th>
    <th>Marcador Local</th>
    <th>Marcador Visitante</th>
    <th>Fecha del evento</th>
    <th>Resultado</th>
    <th colspan="2">Acciones</th>
</thead>
<tbody>
    <?php foreach ($filas as $fila): ?>
        <tr>
            <td><?= $fila['participante_casa'] ?></td>
            <td><?= $fila['participante_visitante'] ?></td>
            <td><?= $fila['resultado_casa'] ?></td>
            <td><?= $fila['resultado_visitante'] ?></td>
            <td><?= $fila['fecha_hora'] ?></td>
            <?php if ($fila['resultado_casa'] === NULL) { ?>
                <td>No empezado</td>
            <?php } else { ?>
                <?php if ($fila['resultado_casa'] === $fila['resultado_visitante']) { ?>
                    <td>X</td>
                    <?php } else if ($fila['resultado_casa'] > $fila['resultado_visitante'] ) { ?>
                    <td>1</td>
                <?php } else { ?>
                    <td>2</td>
                <?php } ?>
            <?php } ?>
            <td align="center">
                <?= anchor('/eventos/editar/' . $fila['id'], 'Editar', 'class="editar"') ?>
            </td>
            <td align="center">
                <?= anchor('/eventos/borrar/' . $fila['id'], 'Borrar', 'class="borrar "') ?>
            </td>
        </tr>
    <?php endforeach ?>
</tbody>
</table>

<?= anchor('/eventos/insertar/', 'Insertar', 'class="insertar"') ?>