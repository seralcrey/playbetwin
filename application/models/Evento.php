<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Evento extends CI_Model
{
    public function todos()
    {
        return $this->db->query('select * from v_eventos_participantes')->result_array();
    }
    
    public function por_id($id)
    {
        $res = $this->db->query('select * from v_eventos_participantes where id = ?',
                                array($id));
        return $res->num_rows() > 0 ? $res->row_array() : FALSE;
    }
    
    public function ver_activos_por_fecha(){
        return $this->db->query('select * from v_eventos_participantes where  hora_evento > current_timestamp')->result_array();
    }

        public function desactivar($id)
    {
        return $this->db->query(" update eventos set activado=false where id=?", array($id));
    }
}