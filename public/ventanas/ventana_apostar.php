<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
        <script type="text/javascript">
            $(window).ready(function () {
                $("form").submit(function (e) {
                    e.preventDefault();
                    cantidad = $('.cantidad').val();
                    if (cantidad < 0 || cantidad == '') {
                        $('.mensaje').append("Mete una cantidad correcta, tiene que ser superior a 0")
                    } else {
                        window.opener.obtener_cantidad(cantidad);
                        window.close();
                    }
                });
            })
        </script>
    </head>
    <body>
        <form action="#">
            <label>Introdusca la cantidad</label>
            <input type="number" class="cantidad">
            <p class="cantidad"></p>
            <input type="submit" value="Apostar">
        </form>
    </body>
</html>

