<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <title><?= isset($title) ? $title : '' ?></title>
        <?= enlaces() ?>
    </head>
    <body>
        <div>
            <header>
                <?= anchor('/deportes/index', img(array(
                                'src' => 'Images/logo-pequeño.png'
                    ))) ?>
            </header>
            <div>
                <div class="contenido">
                    <?= $contents ?>
                </div>
                <aside>
                    
                </aside>
            </div>
            <footer>
            <p>Pie de página</p>
            </footer>
        </div>
        <nav>
            <?= login() ?>
            <?= barra_administrador() ?>
        </nav>
    </body>
</html>


