<?php template_set('title', 'Login') ?>




<html>
    <head>
        <title>Inicio de session</title>
        <meta charset="UTF-8">
        <?= link_tag('css/diseno_login.css') ?>
        <link href='https://fonts.googleapis.com/css?family=Candal' rel='stylesheet' type='text/css'>
        <script src="http://code.jquery.com/jquery-1.9.1.js" type="text/javascript" ></script>
        <script src="<?= base_url() ?>js/info.js" type="text/javascript"></script>
    </head>
    <body>
        <header>
            <div>
                <?=
                anchor('usuarios/login', img(array(
                    'src' => 'Images/logo.png',
                )))
                ?>
            </div>
            <div>
                <h1>Demuestra cuánto sabes de deporte</h1>
                <h2>Muchos usuarios ya apuestan gratis en sus deportes favoritos.</h2>
                <h2>Compite y gana regalos!</h2>
                <?= form_open('usuarios/login') ?>
                <div>
                    <!--<?= form_label('nombre:', 'nombre') ?> -->
                    <?= form_input('nick', set_value('nick', '', FALSE)) ?>
                </div>
                <div>
                    <!--<?= form_label('Contraseña:', 'password') ?>-->
                    <?= form_password('password', '') ?>
                </div>
                <div>
                    <div>
                        <?= form_submit('login', 'Login', 'class="btn btn-success"') ?>
                    </div>
                    <?= form_close() ?>
                    <?= anchor('/usuarios/registar', 'Puedes crear una cuenta nueva con tu email') ?>
                    <p>
                        <a href='#info'>¿Cómo consigo los premios?</a>
                    </p>
                </div>
        </header>
        <div id="info">
            <div>
                <a name='info'></a>
                <h1>1</h1>
                <h1>Juega en los mejores eventos deportivos</h1>
                <p>Pronostica los resultados deportivos que más te gusten. Desde las mejores ligas de fútbol nacionales e 
                    internacionales, baloncesto, tenis, NHL, motoGP, Fórmula 1.</p>
            </div>
            <div>
                <h1>2</h1>
                <h1>Pronostica, acierta y gana Coins</h1>
                <p>Es fácil, si aciertas en tus jugadas ganarás Coins extra. Apuesta de manera inteligente, 
                    sigue los movimientos y jugadas de tus amigos o de nuestros mejores jugadores.</p>
                <p><?= img(array('src' => 'Images/APUESTA.PNG"',)) ?></p>
            </div>
            <div>
                <h1>3</h1>
                <h1>Canjea tus Coins por premios exclusivos</h1>
                <p>Canjea tus Coins por premios exclusivos</p>
                <div>
                    <?= img(array('src' => 'Images/xbox.png"',)) ?>
                    <?= img(array('src' => 'Images/minecraft.png"',)) ?>
                    <?= img(array('src' => 'Images/gopro.png"',)) ?>
                </div>
            </div>
        </div>
    </body>
</html>
