<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function mensajes() {
    $CI =& get_instance();
    $mensajes = $CI->session->flashdata('mensajes');

    $out = "";

    if($mensajes !== NULL) {
        foreach ($mensajes as $mensaje) {
            foreach ($mensaje as $clave => $valor) break;
            $clase = ($clave === 'error') ? 'alert-danger' : 'alert-success';
            $out .= '<div class="row">';
                $out .= '<div class="col-md-8 col-md-offset-2">';
                    $out .= '<div class="alert ' . $clase . '" role="alert">';
                        $out .= $valor;
                    $out .= '</div>';
                $out .= "</div>";
            $out .= '</div>';
        }
    }

    return $out;
}

function apostar($fecha = NULL, $resultado_casa = NULL, $resultado_visitante = NULL){
    $CI =& get_instance();
    $out = "";
    
    $fecha_actual = strtotime(date("H:i:s d/m/Y",time()));
    $fecha_evento = strtotime($fecha);    
    
    if ($fecha_actual < $fecha_evento){ 
        $out .= '<div>';
            $out .= '<p class="marcador"> <?= $fecha_hora ?> </p>';
            $out .= '<div class="apostar">';
                $out .= anchor('/eventos/apostar/1', '1', '');
                $out .= anchor('/eventos/apostar/X', 'X', '');
                $out .= anchor('/eventos/apostar/1', '2', '');
            $out .= '</div>';
        $out .= '</div>';
    } else { 
        $out .= '<div>';
            if ($resultado_casa !== NULL){
                $out .= '<p>'. $resultado_casa . " - " . $resultado_visitante .'</p>';
            }
            $out .= '<p>Ya no puedes apostar</p>';
        $out .= '</div>';
    }
    
    return $out;
}

function editar_evento($id = NULL){
    $CI =& get_instance();
    $out = "";
    
    if($CI->Usuario->es_admin() && $id !== NULL){
        $out .= "<div class='evento_admin'>";
            $out .= "<p>". anchor('/eventos/modificar/'.$id , 'Modificar ' , '')."</p>";
            $out .= "<p>". anchor('/eventos/desactivar/'.$id , 'Desactivar' , '')."</p>";
        $out .= "</div>";
    }
    
    return $out;
}

function crear_evento(){
    $CI =& get_instance();
    $out = "";
    
    if($CI->Usuario->es_admin()){
        $out .= "<div>";
            $out .= "<p>". anchor('/eventos/insertar/' , 'Insertar nuevo evento' , '')."</p>";
        $out .= "</div>";
    }
    
    return $out;
}

function mostar_apuestas($pronosctico = NULL){
    $CI =& get_instance();
    $out = "";
    if ($pronosctico !== NULL){
//        var_dump($pronosctico); die();
        $out  .= '<p '. ($pronosctico === '1' ? 'class="si"' : 'class="no"') .'>1</p>';
        $out  .= '<p '. ($pronosctico === 'X' ? 'class="si"' : 'class="no"') .'>X</p>';
        $out  .= '<p '. ($pronosctico === '2' ? 'class="si"' : 'class="no"') .'>2</p>';
    } else {
        $out  .= '<p class="si">1</p>';
        $out  .= '<p class="si">X</p>';
        $out  .= '<p class="si">2</p>';
    }
    
    return $out;
}