<?php

class Career_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    
    //Nos permite actualizar una carrera en especifico
    function update($pId,$codigo, $nombre) {
        $data = array(
            'codigo_carrera' => $codigo,
            'nombre' => $nombre
        );
        $this->db->where('id_carreras', $pId);
        $this->db->update('carreras', $data);
    }
    //Nos permite eliminar carreras
    function delete($pId) {
        $data = array(
            'id_carreras' => $pId
        );
        $this->db->delete('carreras', $data);
    }

    //Nos muestra todos los detalles referente a una carrera en especifico
    function detalles($pId) {
        $this->db->where("id_carreras", $pId);
        $query = $this->db->get('carreras');
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return null;
        }
    }

    //Nos permite registrar carreras en la base de datos
    function insert_career($codigo, $carrera) {
        $data = array(
            'codigo_carrera' => $codigo,
            'nombre' => $carrera
        );
        $this->db->insert('carreras', $data);
    }

    //Nos permite obtener una carrera en especifico
    function get_career($codigo) {
        $this->db->where('codigo_carrera', $codigo);
        $query = $this->db->get('carreras');
        return $query->row();
    }

    //Obtenemos todas las carreras registradas en la base de datos
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