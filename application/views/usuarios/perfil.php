<?php template_set('title', 'Perfil') ?>


<div>
    <h1>
        <?= $nombre ?>
        <?= anchor('/usuarios/editar/'.$id, 'Editar', 'class=""') ?>
    </h1>
    <p><?= anchor('/usuarios/avatar/'.$id, 'Cambiar avatar', 'class="" r') ?></p>
</div>
