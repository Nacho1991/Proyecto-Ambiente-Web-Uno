<?php

class Student_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    //Actualiza a un estudiante en especifico
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

    //Permite detallar a un estudiante en especificp
    public function detalles($pId) {
        $this->db->where("id_estudiante", $pId);
        $query = $this->db->get('estudiante');
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return null;
        }
    }

    //Nos permite registrar comentarios a un mismo estudiante
    function insertComment($cedula, $nombreProfesor, $fechaProfesor, $comentario) {
        $data = array(
            'estudiante_fk' => $cedula,
            'nombre_profesor' => $nombreProfesor,
            'fecha' => $fechaProfesor,
            'comentario' => $comentario
        );
        $this->db->insert('comentarios', $data);
    }

    //Nos permite asociar proyectos a un solo estudiante
    function insertProyect($cedula, $cursos, $duracion, $descripcion, $calificacion, $tecnologias, $fecha) {
        $data = array(
            'estudiante_fk' => $cedula,
            'curso_fk' => $cursos,
            'duracion' => $duracion,
            'tecnologias_fk' => $tecnologias,
            'descripcion' => $descripcion,
            'calificacion' => $calificacion,
            'fecha' => $fecha);
        $this->db->insert('proyectos', $data);
    }

    //Nos permite eliminar estudiantes
    function delete($cedula) {
        $data = array(
            'cedula' => $cedula
        );
        $this->db->delete('estudiante', $data);
    }

    //Permite la insercion de estudiantes en la base de datos
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

    //Nos permite registrar comentarios a un mismo estudiante
    function insertarComentario($cedula, $nombreProfesor, $fecha, $comentario) {
        $data = array(
            'estudiante_fk' => $cedula,
            'nombre_profesor' => $nombreProfesor,
            'fecha' => $fecha,
            'comentario' => $comentario
        );
        $this->db->insert('comentarios', $data);
    }

    //Nos permite asociar proyectos a un solo estudiante
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

    //Permite obtener todos los comentarios asociados a un mismo estudiante
    function obtenerComentarios($pCedula) {
        $this->db->where("estudiante_fk", $pCedula);
        $query = $this->db->get('comentarios');
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return false;
        }
    }

    //Nos permite obtener todos los proyectos asociados a un mismo estudiante
    function obtenerProyectos($pCedula) {
        $this->db->where("estudiante_fk", $pCedula);
        $query = $this->db->get('proyectos');
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return false;
        }
    }

    //Se obtienen todas las habilidades registradas en la base de datos
    function obtenerSkills() {
        $query = $this->db->get('skills');
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return false;
        }
    }

    //Se obtienen todos los curso registrados en el sistema de base de datos
    function obtenerCursos() {
        $query = $this->db->get('cursos');
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return false;
        }
    }

    //Se obtienen todas las carreras registradas en la base de datos
    function obtenerCarreras() {
        $query = $this->db->get('carreras');
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return false;
        }
    }

    //Se obtienen todas las tecnologias registradas en el sistema de base de datos
    function obtenerTecnologias() {
        $query = $this->db->get('tecnologias');
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return false;
        }
    }

    //Se obtiene el registros de un solo estudiante
    function get_student($pId) {
        $this->db->where('id_estudiante', $pId);
        $query = $this->db->get('estudiante');
        return $query->row();
    }

    //Se obtiene el registro de todos los estudiantes en la base de datos
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