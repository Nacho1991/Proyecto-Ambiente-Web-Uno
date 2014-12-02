<?php

class Career_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function update($pId,$codigo, $nombre) {
        $data = array(
            'codigo_carrera' => $codigo,
            'nombre' => $nombre
        );
        $this->db->where('id_carreras', $pId);
        $this->db->update('carreras', $data);
    }

    function delete($pId) {
        $data = array(
            'id_carreras' => $pId
        );
        $this->db->delete('carreras', $data);
    }

    function detalles($pId) {
        $this->db->where("id_carreras", $pId);
        $query = $this->db->get('carreras');
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return null;
        }
    }

    function insert_career($codigo, $carrera) {
        $data = array(
            'codigo_carrera' => $codigo,
            'nombre' => $carrera
        );
        $this->db->insert('carreras', $data);
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