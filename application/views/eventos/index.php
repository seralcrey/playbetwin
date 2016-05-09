<?php template_set('title', 'Eventos') ?>

<h1>Proximo eventos</h1>

<div>
    <?php foreach ($filas as $fila): ?>
        <div>
            <p class="partido"><?= anchor('/eventos/perfil/' . $fila['id'], $fila['participante_casa'] .
            " vs " . $fila['participante_visitante'], 'class="partido"')?></p>
            <p><?= $fila['fecha_hora'] ?></p>
        </div>
<?php endforeach ?>
</div>
