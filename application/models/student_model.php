<?php

class Student_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function update($nombre, $cedula, $carrera, $nivelIngles, $habilidades) {
        $data = array(
            'nombre' => $nombre,
            'carrera_fk' => $carrera,
            'nivel_ingles' => $nivelIngles,
            'skill_fk' => $habilidades
        );
        $this->db->where('cedula', $cedula);
        $query = $this->db->update('estudiante', $data);
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return null;
        }
    }

    function delete($cedula) {
        $data = array(
            'cedula' => $cedula
        );
        $query = $this->db->delete('estudiante', $data);
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return null;
        }
    }

    function insert_student($nombre, $cedula, $carrera, $nivelIngles, $habilidades) {
        $data = array(
            'cedula' => $cedula,
            'nombre' => $nombre,
            'carrera_fk' => $carrera,
            'nivel_ingles' => $nivelIngles,
            'skill_fk' => $habilidades
        );
        $query = $this->db->insert('estudiante', $data);
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return null;
        }
    }

    function get_student($cedula) {
        $this->db->where('cedula', $cedula);
        $query = $this->db->get('estudiante');
        return $query->row();
    }

    function get_all() {
        $query = $this->db->get('estudiante');
        return $query->result();
    }

}

?>