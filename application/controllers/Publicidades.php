<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Publicidades extends CI_Controller {

    private $reglas_comunes = array(
        array(
            'field' => 'nombre',
            'label' => 'Nombre',
            'rules' => 'trim|required|max_length[50]'
        ),
        array(
            'field' => 'url',
            'label' => 'URL',
            'rules' => 'trim|required|max_length[200]'
        ),
        array(
            'field' => 'coins',
            'label' => 'Coins',
            'rules' => 'trim|required|numeric|less_than_equal_to[999999]'
        )
    );

    public function index() {
        $data['filas'] = $this->Publicidad->todos();
        $this->template->load('publicidades/index', $data);
    }

    public function borrar($id = NULL) {
        if ($this->input->post('borrar') !== NULL) {
            $id = $this->input->post('id');
            if ($id !== NULL) {
                $this->Publicidad->borrar($id);
            }
            redirect('publicidades/index');
        } else {
            if ($id === NULL) {
                redirect('publicidades/index');
            } else {
                $res = $this->Publicidad->por_id($id);
                if ($res === FALSE) {
                    redirect('publicidades/index');
                } else {
                    $data = $res;
                    $this->template->load('publicidades/borrar', $data);
                }
            }
        }
    }

    public function insertar() {
        if ($this->input->post('insertar') !== NULL) {
            $reglas = $this->reglas_comunes;
            $this->form_validation->set_rules($reglas);
            if ($this->form_validation->run() !== FALSE) {
                $valores = $this->limpiar('insertar', $this->input->post());
                $this->Publicidad->insertar($valores);
                redirect('publicidades/index');
            }
        }
        $this->template->load('publicidades/insertar');
    }

    public function editar($id = NULL) {
        if ($id === NULL) {
            redirect('publicidades/index');
        }

        $id = trim($id);

        if ($this->input->post('editar') !== NULL) {
            $reglas = $this->reglas_comunes;
            $this->form_validation->set_rules($reglas);
            if ($this->form_validation->run() !== FALSE) {
                $valores = $this->limpiar('editar', $this->input->post());
                $this->Publicidad->editar($valores, $id);
                redirect('publicidades/index');
            }
        }
        $valores = $this->Publicidad->por_id($id);
        if ($valores === FALSE) {
            redirect('publicidades/index');
        }
        $data = $valores;
        $this->template->load('publicidades/editar', $data);
    }

    public function activar($id = NULL) {
        if ($id === NULL) {
            redirect('publicidades/index');
        }
        
        $valores['activado'] = TRUE;
        $this->Publicidad->editar($valores, $id);
        redirect('publicidades/index');
    }
    
    public function desactivar($id = NULL) {
        if ($id === NULL) {
            redirect('publicidades/index');
        }
        
        $valores['activado'] = FALSE;
        $this->Publicidad->editar($valores, $id);
        redirect('publicidades/index');
    }

    private function limpiar($accion, $valores) {
        unset($valores[$accion]);
        return $valores;
    }

}
