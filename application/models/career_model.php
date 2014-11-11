<?php

class Career_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function update($codigo,$nombre) {
        $data = array(
            'codigo_carrera' => $codigo,
            'nombre' => $nombre
        );
        $this->db->where('codigo_carrera', $codigo);
        $query = $this->db->update('carreras', $data);
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return null;
        }
    }

    function delete($codigo) {
        $data = array(
            'codigo_carrera' => $codigo
        );
        $query = $this->db->delete('carreras', $data);
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return null;
        }
    }

    function insert_career($codigo, $carrera) {
        $data = array(
            'codigo_carrera' => $codigo,
            'nombre' => $carrera
        );
        $query = $this->db->insert('carreras', $data);
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return null;
        }
    }

    function get_career($codigo) {
        $this->db->where('codigo_carrera', $codigo);
        $query = $this->db->get('carreras');
        return $query->row();
    }

    function get_all() {
        $query = $this->db->get('carreras');
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return false;
        }
    }

}

?>