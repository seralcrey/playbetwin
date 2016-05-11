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
    
    public function apostar($valores)
    {
        return $this->db->insert('apuestas', $valores);
    }
    
    public function ya_apostado($id_usuario, $id_evento){
        $res = $this->db->query('select * from apuestas where id_usuario = ? and id_evento = ?',
                                array($id_usuario, $id_evento));
        return $res->num_rows() > 0 ? $res->row_array() : FALSE;
    }
}