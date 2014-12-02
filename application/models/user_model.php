<?php

class User_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function authenticate($nombreUsuario, $contrasenna) {
        // convierto el password a MD5 para comparar
        $password = md5($contrasenna);
        $this->db->where('nombre_usuario', $nombreUsuario);
        $this->db->where('contrasenna', $password);
        $query = $this->db->get('usuarios');
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return null;
        }
    }

    function obtenerRoles() {
        $query = $this->db->get('roles');
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return false;
        }
    }

    function contarRegistrosUsuarios() {
        return $rowcount = $this->db->count_all('usuarios');
    }
    function contarRegistrosEstudiantes(){
        return $rowcount = $this->db->count_all('estudiante');
    }
    function contarRegistrosCarreras(){
        return $rowCount=$this->db->count_all('carreras');
    }
            function update($id, $cedula, $nombre, $nombreUsuario, $contrasenna, $role) {
        $data = array(
            'nombre' => $nombre,
            'cedula' => $cedula,
            'nombre_usuario' => $nombreUsuario,
            'contrasenna' => $contrasenna,
            'role_fk' => $role
        );
        $this->db->where('id_usuarios', $id);
        $this->db->update('usuarios', $data);

        return $this->detalles($id);
    }

    function detalles($pId) {
        $this->db->where("id_usuarios", $pId);
        $query = $this->db->get('usuarios');
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return null;
        }
    }

    function delete($cedula) {
        $data = array(
            'id_usuarios' => $cedula
        );
        $this->db->delete('usuarios', $data);
    }

    function insert_user($nombre, $cedula, $nombreUsuario, $contrasenna, $role) {
        $data = array(
            'cedula' => $cedula,
            'nombre' => $nombre,
            'nombre_usuario' => $nombreUsuario,
            'contrasenna' => $contrasenna,
            'role_fk' => $role
        );
        $this->db->insert('usuarios', $data);
    }

    function get_user($nombreUsuario) {
        $this->db->where('nombre_usuario', $nombreUsuario);
        $query = $this->db->get('usuarios');
        return $query->row();
    }

    function get_all() {
        $query = $this->db->get('usuarios');
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return false;
        }
    }

}

?>