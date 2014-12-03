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

    function insertarComentario($cedula, $nombreProfesor, $fecha, $comentario) {
        $data = array(
            'estudiante_fk' => $cedula,
            'nombre_profesor' => $nombreProfesor,
            'fecha' => $fecha,
            'comentario' => $comentario
        );
        $this->db->insert('comentarios', $data);
    }

    function insertarProyecto($cedula, $cursos, $duracion, $descripcion, $calificacion, $tecnologias, $fecha) {
        $data = array(
            'estudiante_fk' => $cedula,
            'curso_fk' => $cursos,
            'duracion' => $duracion,
            'tecnologias_fk' => $tecnologias,
            'descripcion' => $descripcion,
            'calificacion' => $calificacion,
            'fecha' => $fecha
        );
        $this->db->insert('proyectos', $data);
    }

    function obtenerComentarios($pCedula) {
        $this->db->where("estudiante_fk", $pCedula);
        $query = $this->db->get('comentarios');
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return false;
        }
    }

    function obtenerProyectos($pCedula) {
        $this->db->where("estudiante_fk", $pCedula);
        $query = $this->db->get('proyectos');
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return false;
        }
    }

    function obtenerSkills() {
        $query = $this->db->get('skills');
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return false;
        }
    }

    function obtenerCursos() {
        $query = $this->db->get('cursos');
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

    function obtenerTecnologias() {
        $query = $this->db->get('tecnologias');
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