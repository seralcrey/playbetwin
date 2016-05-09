<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Publicidad extends CI_Model {

    public function todos() {
        return $this->db->query('select * from publicidades')->result_array();
    }

    public function por_id($id) {
        $res = $this->db->query('select * from publicidades where id = ?', array($id));
        return $res->num_rows() > 0 ? $res->row_array() : FALSE;
    }

    public function borrar($id) {
        return $this->db->query("delete from publicidades where id = ?", array($id));
    }

    public function insertar($valores) {
        return $this->db->insert('publicidades', $valores);
    }

    public function editar($valores, $id) {
        return $this->db->where('id', $id)->update('publicidades', $valores);
    }

}
