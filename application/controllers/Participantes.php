<?php defined('BASEPATH') OR exit('No direct script access allowed');


class Participantes extends CI_Controller
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
        $data['filas'] = $this->Participante->todos();
        $this->template->load('participantes/index', $data);
    }

    public function borrar($id = NULL)
    {
        if ($this->input->post('borrar') !== NULL)
        {
            $id = $this->input->post('id');
            if ($id !== NULL)
            {
                $this->Participante->borrar($id);
            }
            redirect('participantes/index');
        }
        else
        {
            if ($id === NULL)
            {
                redirect('participantes/index');
            }
            else
            {
                $res = $this->Participante->por_id($id);
                if ($res === FALSE)
                {
                    redirect('participantes/index');
                }
                else
                {
                    $data = $res;
                    $this->template->load('participantes/borrar', $data);
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
                $this->Participante->insertar($valores);
                redirect('participantes/index');
            }
        }
        $data['filas'] = $this->Deporte->todos();
        $this->template->load('participantes/insertar', $data);
    }
    
    public function editar($id = NULL) {
        if ($id === NULL) {
            redirect('participantes/index');
        }

        $id = trim($id);

        if ($this->input->post('editar') !== NULL) {
            $reglas = $this->reglas_comunes;
            $this->form_validation->set_rules($reglas);
            if ($this->form_validation->run() !== FALSE) {
                $valores = $this->limpiar('editar', $this->input->post());
                $this->Participante->editar($valores, $id);
                redirect('participantes/index');
            }
        }
        $valores = $this->Participante->por_id($id);
        if ($valores === FALSE) {
            redirect('participantes/index');
        }
        $data = $valores;
        $data['filas'] = $this->Deporte->todos();

        $this->template->load('participantes/editar', $data);
    }
    
    
    private function limpiar($accion, $valores) {
        unset($valores[$accion]);
        return $valores;
    }
}
