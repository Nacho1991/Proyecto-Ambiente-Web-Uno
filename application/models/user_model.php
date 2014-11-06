<?php

class User_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function authenticate($nombreUsuario, $contrasenna) {
        // convierto el password a MD5 para comparar
        //$password = md($password);

        $this->db->where('nombre_usuario', $nombreUsuario);
        $this->db->where('contrasenna', $contrasenna);
        $query = $this->db->get('usuarios');
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return null;
        }
    }

    function update($cedula, $nombre, $nombreUsuario, $contrasenna, $role) {
        $data = array(
            'nombre' => $nombre,
            'nombre_usuario' => $nombreUsuario,
            'contrasenna' => $contrasenna,
            'role_fk' => $role
        );
        $this->db->where('cedula', $cedula);
        $query = $this->db->update('usuarios', $data);
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
        $query = $this->db->delete('usuarios', $data);
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return null;
        }
    }

    function insert_user($nombre, $cedula, $nombreUsuario, $contrasenna, $role) {
        $data = array(
            'cedula' => $cedula,
            'nombre' => $nombre,
            'nombre_usuario' => $nombreUsuario,
            'contrasenna' => $contrasenna,
            'role_fk' => $role
        );
        $query = $this->db->insert('usuarios', $data);
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return null;
        }
    }

    function get_user($nombreUsuario) {
        $this->db->where('nombre_usuario', $nombreUsuario);
        $query = $this->db->get('usuarios');
        return $query->row();
    }

    function get_all() {
        $query = $this->db->get('usuarios');
        return $query->result();
    }

}

?>