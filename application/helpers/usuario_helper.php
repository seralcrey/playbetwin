<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

function login() {
    $CI = & get_instance();

    $out = "";
    if ($CI->Usuario->logueado()):
        $usuario = $CI->session->userdata('usuario');
        $info_usuario = $CI->Usuario->por_id($usuario['id']);
        $out .= '<div class="info-usuario">';
            $out .= '<div class="img-usuario">';
                $out .= anchor(
                    'usuarios/perfil/'.$usuario['id'], 
                    img(array( 'src' => 'Images/usuarios/'.$usuario['id'].".png", 
                    
                )), '');
            $out .= '</div >';
            $out .= '<div class="">';
                $out .= anchor('/usuarios/perfil/' . $usuario['id'], $usuario['nick'], '');
            $out .= '</div >';
            $out .= '<div >';
                $out .= $info_usuario['coins']. " coins";
            $out .= '</div >';
            $out .= '<div class="logout">';
                $out .= anchor('usuarios/logout', img(array(
                    'src' => 'Images/iconos/1462287602_on-off.ico'
                )));
            $out .= '</div>';
        $out .= '</div>';
    endif;

    return $out;
}

function enlaces() {
    $CI = & get_instance();

    $out = "";

    if ($CI->Usuario->logueado()):
        $out .= "<link href='https://fonts.googleapis.com/css?family=Candal' rel='stylesheet' type='text/css'>";
        $out .= link_tag('css/estilo_princiapal.css');
        $out .= '<script src="' . base_url() . 'js/header.js" type="text/javascript"></script>';
    endif;

    return $out;
}

function usuario_id() {
    $CI = & get_instance();
    return $CI->session->userdata('usuario')['id'];
}

function logueado() {
    $CI = & get_instance();
    return $CI->Usuario->logueado();
}

function nombre($usuario_id) {
    $CI = & get_instance();
    $usuario = $CI->Usuario->por_id($usuario_id);
    if ($usuario !== FALSE) {
        return $usuario['nombre'];
    }
}

function barra_administrador(){
    $CI = & get_instance();
    
    $out = "";

    if ($CI->Usuario->es_admin()){
        
        $out .= "<div id=administrador>";
            $out .= "<div>";
                $out .= anchor('/apuestas/index/', 'Apuestas' , '');
            $out .= "</div>";
            $out .= "<div>";
                $out .= anchor('/deportes/index/', 'Deportes' , '');
            $out .= "</div>";
            $out .= "<div>";
                $out .= anchor('/eventos/administracion/', 'Eventos' , '');
            $out .= "</div>";
            $out .= "<div>";
                $out .= anchor('/participantes/index/', 'Participantes' , '');
            $out .= "</div>";
            $out .= "<div>";
                $out .= anchor('/publicidades/index/', 'Publicidad' , '');
            $out .= "</div>";
            $out .= "<div>";
                $out .= anchor('/usuarios/index/', 'Usuario' , '');
            $out .= "</div>";
        $out .= "</div>";   
    }
    return $out;
}