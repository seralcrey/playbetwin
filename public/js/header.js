
$(document).ready(function ($) {
    tamaño_header();
    tamaño_nav();
    
    $(window).resize(function () {
        tamaño_header();
    });

    function tamaño_header() {
        var ventana = $(window).width();
        var nav = $("nav").width();
        var tamaño = ventana-nav-15;
        var styles  = {
            width: tamaño
        };
        $("header").css(styles);
    }

    function tamaño_nav(){
        var ventana = $(window).height();
        var styles  = {
            height: ventana
        };
        $("nav").css(styles);
    }
});  