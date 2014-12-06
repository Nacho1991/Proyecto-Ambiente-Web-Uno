<?php

class Buscador_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function like($pFiltro) {
        // Genera: SELECT * FROM proyectos LIKE tecnologias_fk = '%$pFiltro%'
        $this->db->like("tecnologias_fk", $pFiltro);
        $query = $this->db->get("proyectos");
        return $query;
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

    function join() {
        //Para unir dos o más tablas con “join” también se 
        //podrá realizar de una forma sencilla, como lo 
        //muestro a continuación:

        $this->db->select('*');
        $this->db->from('blogs');
        $this->db->join('comments', 'comments.id = blogs.id');
        $query = $this->db->get();
//El cual dará como resultado la siguiente consulta:
//SELECT * FROM blogs
//JOIN comments ON comments.id = blogs.id
    }

}
