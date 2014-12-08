<?php

class Buscador_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    //Obtenemos los resultados de la busqueda
    function like($pFiltro, $pTipoBusqueda) {
        if ($pTipoBusqueda === 'habilidades') {
             // Genera: SELECT * FROM proyectos LIKE tecnologias_fk = '%$pFiltro%'
            $this->db->like("skill_fk", $pFiltro);
            return $query = $this->db->get("estudiante");
        } else if ($pTipoBusqueda === 'tecnologia') {
            // Genera: SELECT * FROM proyectos LIKE tecnologias_fk = '%$pFiltro%'
            $this->db->like("tecnologias_fk", $pFiltro);
            return $query = $this->db->get("proyectos");
        }
    }

    //Obtenemos todos los registros de los estudiantes en la base de datos
    function obtenerEstudiante($pCedula) {
        $this->db->where("cedula", $pCedula);
        $query = $this->db->get('estudiante');
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return null;
        }
    }

    //Obtenemos todos los comentarios realizados a un estudiante en especifico
    function obtenerComentarios($pCedula) {
        $this->db->where("estudiante_fk", $pCedula);
        $query = $this->db->get('comentarios');
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return false;
        }
    }

    //Obtenemos todos los proyectos asociados a un estudiante en especifico
    function obtenerProyectos($pCedula) {
        $this->db->where("estudiante_fk", $pCedula);
        $query = $this->db->get('proyectos');
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return false;
        }
    }

}
