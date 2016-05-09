<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Eventos extends CI_Controller {
    
    public function index() {
        $data['filas'] = $this->Evento->ver_activos_por_fecha();
        $this->template->load('eventos/index', $data);
    }
    
    public function perfil($id = NULL) {
        if($id === NULL) {
            redirect('usuarios/login');
        }
        $evento = $this->Evento->por_id($id);
        $this->template->load('eventos/perfil', $evento);
    }
    
    public function desactivar($id = NULL)
    {   
        if ($this->input->post('desactivar') !== NULL)
        {
            $id = $this->input->post('id');
            if ($id !== NULL)
            {
                $this->Evento->desactivar($id);
            }
            redirect('eventos/index');
        }
        else
        {
            if ($id === NULL)
            {
                redirect('eventos/index');
            }
            else
            {
                $res = $this->Evento->por_id($id);
                if ($res === FALSE)
                {
                    redirect('eventos/index');
                }
                else
                {
                    $data = $res;
                    $this->template->load('eventos/desactivar', $data);
                }
            }
        }
    }
    
    
}
