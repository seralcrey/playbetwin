<?php template_set('title', 'Perfil') ?>



<h1>
    <?= $participante_casa . " vs " . $participante_visitante ?>
</h1>

<h2><?= $competicion ?></h2>
<?= apostar($fecha_hora, $resultado_casa, $resultado_visitante) ?>




