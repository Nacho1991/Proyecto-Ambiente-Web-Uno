<?php

class Buscador_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

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

    function obtenerEstudiante($pCedula) {
        $this->db->where("cedula", $pCedula);
        $query = $this->db->get('estudiante');
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return null;
        }
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

}
