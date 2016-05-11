$(window).ready(function () {
    $("form").submit(function(e){
        e.preventDefault();
        cantidad = $('.cantidad').val();
        if(cantidad < 0 || cantidad == ''){
            $('.mensaje').append("Mete una cantidad correcta, tiene que ser superior a 0")
        } else {
            window.opener.obtener_cantidad(cantidad);
            window.close();
        }
        
        
    });
})

