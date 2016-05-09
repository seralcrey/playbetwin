
$(document).ready(function ($) {
    tamaño_header();
    tamaño_nav();
    tamaño_contenido();

    $(window).resize(function () {
        tamaño_header();
        tamaño_nav();
        tamaño_contenido();
    });

    function tamaño_header() {
        var ventana = $(window).width();
        var nav = $("nav").width();
        var tamaño = ventana - nav;
        var styles = {
            width: tamaño
        };
        $("header").css(styles);
    }

    function tamaño_nav() {
        var ventana = $(window).height();
        var styles = {
            height: ventana
        };
        $("nav").css(styles);
    }

    function tamaño_contenido() {
        var ventana = $(window).width();
        var nav = $("nav").width();
        var aside = $("aside").width();
        var tamaño = ventana - nav - aside;

        var styles = {
            width: tamaño,
            marginRigth: '20px;'
        };
        $(".contenido").css(styles);
    }

});  