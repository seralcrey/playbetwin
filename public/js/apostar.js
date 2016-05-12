$(window).ready(function () {
    apuesta = ""
    
    $('.apostar').find('p.si').click(function () {
        apuesta = $(this).text();
        abrirHijo();
    });
    
});

function abrirHijo() {
    url = window.location.host
    ventana = window.open("http://" + url + "/ventanas/ventana_apostar.php", "ventana", "width=300,height=200");
}

function obtener_cantidad(cantidad) {

    url = window.location.host;
    url_id = window.location.pathname;
    var pathArray = window.location.pathname.split( '/' );
    var evento = pathArray[3];
    
    $.ajax({
        url: 'http://' + url + '/eventos/perfil/'+evento,
        type: 'POST',
        data: {
            apostar: true,
            coins: cantidad,
            id_evento: evento,
            pronostico: apuesta,
        },
    })
    //.success(siRespuesta)
    .error(siError);

}

function siRespuesta(r) {
    alert('Correcto');
}

function siError(e) {
    alert('Ocurrió un error al realizar la petición: ' + e.statusText);
}