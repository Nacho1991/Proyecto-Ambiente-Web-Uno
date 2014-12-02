<?php

class Student_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function update($id, $cedula, $nombre, $carrera, $nivelIngles, $habilidades) {
        $data = array(
            'cedula' => $cedula,
            'nombre' => $nombre,
            'carrera_fk' => $carrera,
            'nivel_ingles' => $nivelIngles,
            'skill_fk' => $habilidades
        );
        $this->db->where('id_estudiante', $id);
        $this->db->update('estudiante', $data);
    }

    public function detalles($pId) {
        $this->db->where("id_estudiante", $pId);
        $query = $this->db->get('estudiante');
        if ($query->num_rows() > 0) {
            return $query;
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
        $this->db->insert('estudiante', $data);
    }

    function obtenerSkills() {
        $query = $this->db->get('skills');
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return false;
        }
    }

    function obtenerCarreras() {
        $query = $this->db->get('carreras');
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return false;
        }
    }

    function get_student($pId) {
        $this->db->where('id_estudiante', $pId);
        $query = $this->db->get('estudiante');
        return $query->row();
    }

    function get_all() {
        $query = $this->db->get('estudiante');
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return false;
        }
    }

}

?>