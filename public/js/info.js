
$(document).ready(function ($) {
    tamaño_header();

    $(window).resize(function () {
        tamaño_header();
    });

    function tamaño_header() {
        var ventana_alto = $(window).height();
        
        if (ventana_alto < 450) {
            var styles = {
                height: "450px",
                paddingTop: "0px"
            };
        } else {
            if (ventana_alto > 700) {
                var padding = ventana_alto / 4;
                var styles = {
                    height: ventana_alto - padding,
                    //paddingTop: padding
                };

            } else {
                var padding = ventana_alto / 8;
                var styles = {
                    height: ventana_alto,
                    //paddingTop: padding
                };
            }
        }

        $("header").css(styles);
    }
});  