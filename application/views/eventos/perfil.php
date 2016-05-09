<?php template_set('title', 'Perfil') ?>



<h1>
    <?= $participante_casa . " vs " . $participante_visitante ?>
</h1>

<h2><?= $competicion ?></h2>
<div>
    <p class="marcador"> <?= $fecha_hora ?> </p>
    <div class="apostar">
        <?= anchor('/eventos/apostar/1', '1', '') ?>
        <?=anchor('/eventos/apostar/X', 'X', '')?>
        <?=anchor('/eventos/apostar/1', '2', '')?>
    </div>
</div>




