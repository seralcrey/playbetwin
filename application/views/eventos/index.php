<?php template_set('title', 'Eventos') ?>

<h1>Proximos eventos</h1>

<div class="ver_apuestas">
    <?php foreach ($filas as $fila): ?>
         <?= anchor('/eventos/perfil/' . $fila['id'], '<div>
            <p class="partido">' . $fila['participante_casa'] . " vs " . $fila['participante_visitante']. '</p> '
                 . '<p>' . $fila['fecha_hora'] . '</p>'.
                 '<p> '. $fila['competicion'] , '') ?>
        </div>
<?php endforeach ?>
</div>
