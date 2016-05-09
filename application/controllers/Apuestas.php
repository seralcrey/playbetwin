<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Apuestas extends CI_Controller
{
    
    public function __construct() {
        parent::__construct();
    }
    
    public function index(){
        $data['filas'] = $this->Apuesta->todos();
        $this->template->load('apuestas/index', $data);
    }
    
    public function borrar($id = NULL)
    {
        if ($this->input->post('borrar') !== NULL)
        {
            $id = $this->input->post('id');
            if ($id !== NULL)
            {
                $this->Apuesta->borrar($id);
                $this->output->delete_cache('/apuestas/index');
            }
            redirect('apuestas/index');
        }
        else
        {
            if ($id === NULL)
            {
                redirect('apuestas/index');
            }
            else
            {
                $res = $this->Apuesta->por_id($id);
                if ($res === FALSE)
                {
                    redirect('apuestas/index');
                }
                else
                {
                    $data = $res;
                    $this->template->load('apuestas/borrar', $data);
                }
            }
        }
    }
}