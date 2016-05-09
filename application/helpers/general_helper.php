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
    
    var_dump(date("H:i d/m/Y",time()));
    var_dump($fecha);
    var_dump($fecha_actual);
    var_dump($fecha_evento); die();
    
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
            $out .= '<p>'. $resultado_casa . " - " . $resultado_visitante .'</p>';
            $out .= '<p>Ya no puedes apostar</p>';
        $out .= '</div>';
    }
    
    return $out;
}