<?php defined('BASEPATH') OR exit('No direct script access allowed');


class Deportes extends CI_Controller
{
    
    private $reglas_comunes = array(
        array(
            'field' => 'nombre',
            'label' => 'Nombre',
            'rules' => 'trim|required|max_length[50]'
        )
    );
    
    public function __construct() {
        parent::__construct();
    }

    public function index(){
        $data['filas'] = $this->Deporte->todos();
        $this->template->load('deportes/index', $data);
    }

    public function borrar($id = NULL)
    {
        if ($this->input->post('borrar') !== NULL)
        {
            $id = $this->input->post('id');
            if ($id !== NULL)
            {
                $this->Deporte->borrar($id);
            }
            redirect('deportes/index');
        }
        else
        {
            if ($id === NULL)
            {
                redirect('deportes/index');
            }
            else
            {
                $res = $this->Deporte->por_id($id);
                if ($res === FALSE)
                {
                    redirect('deportes/index');
                }
                else
                {
                    $data = $res;
                    $this->template->load('deportes/borrar', $data);
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
                $this->Deporte->insertar($valores);
                redirect('deportes/index');
            }
        }
        $this->template->load('deportes/insertar');
    }
    
    public function editar($id = NULL) {
        if ($id === NULL) {
            redirect('deportes/index');
        }

        $id = trim($id);

        if ($this->input->post('editar') !== NULL) {
            $reglas = $this->reglas_comunes;
            $this->form_validation->set_rules($reglas);
            if ($this->form_validation->run() !== FALSE) {
                $valores = $this->limpiar('editar', $this->input->post());
                $this->Deporte->editar($valores, $id);
                redirect('deportes/index');
            }
        }
        $valores = $this->Deporte->por_id($id);
        if ($valores === FALSE) {
            redirect('deportes/index');
        }
        $data = $valores;
        $this->template->load('deportes/editar', $data);
    }
    
    
    private function limpiar($accion, $valores) {
        unset($valores[$accion]);
        return $valores;
    }
}
