<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Eventos extends CI_Controller {
    
    public function index() {
        $data['filas'] = $this->Evento->todos();
        $this->template->load('eventos/index', $data);
    }
    
    public function administracion() {
        $data['filas'] = $this->Evento->todos();
        $this->template->load('eventos/administracion', $data);
    }
    
    public function perfil($id = NULL) {
        if($id === NULL) {
            redirect('usuarios/login');
        }
        $evento = $this->Evento->por_id($id);
        $this->template->load('eventos/perfil', $evento);
    }
    
}
