<?php template_set('title', 'Perfil') ?>



<h1>
    <?= $participante_casa . " vs " . $participante_visitante ?>
</h1>

<h2><?= $competicion ?></h2>
<div>
    <p class="marcador"> <?= $fecha_hora ?> </p>
    <div class="apostar">
        <p>1</p>
        <p>X</p>
        <p>2</p>
    </div>
</div>
<script src="<?= base_url()?>js/apostar.js" type="text/javascript"></script>
<p id="cantidad"></p>


