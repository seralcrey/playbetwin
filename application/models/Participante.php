<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Participante extends CI_Model
{
    public function todos()
    {
        return $this->db->query('select * from v_participantes')->result_array();
    }
    
    public function por_id($id)
    {
        $res = $this->db->query('select * from participantes where id = ?',
                                array($id));
        return $res->num_rows() > 0 ? $res->row_array() : FALSE;
    }
    
    public function borrar($id)
    {
        return $this->db->query(" update participantes set activado=false where id=?", array($id));
    }
    
    public function insertar($valores)
    {
        return $this->db->insert('participantes', $valores);
    }
    
    public function editar($valores, $id)
    {
        return $this->db->where('id', $id)->update('participantes', $valores);
    }
}