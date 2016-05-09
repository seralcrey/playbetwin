
<h3>¿Seguro que desea borrar la siguiente publicidad?</h3>
<p>Nombre: <?= $nombre ?></p>
<p>URL: <?= $url ?></p>
<p><?= $coins ?></p>
<?php if ($imagen === "f") { ?>
    <td>Sin imagen</td>
<?php } else { ?>
    <td><?php
        img(array(
            'src' => 'publicidad/' . $fila['id'] . '.png'
        ))
        ?></td>
<?php } ?> 
<?= form_open('publicidades/borrar') ?>
<?= form_hidden('id', $id) ?>
<?= form_submit('borrar', 'Sí') ?>
<?= anchor('publicidades/index', form_button('no', 'No')) ?>
<?= form_close() ?>
