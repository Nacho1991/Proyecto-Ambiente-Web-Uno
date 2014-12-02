<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct() {

        parent::__construct();
        $this->load->model('User_model', 'user');
    }

    public function index() {

        $contador = array(
            'usuarios' => $this->user->contarRegistrosUsuarios(),
            'estudiantes' => $this->user->contarRegistrosEstudiantes(),
            'carreras' => $this->user->contarRegistrosCarreras());
        $this->load->view('plantillas/header');
        $this->load->view('user/dashboard', $contador);
    }

    public function detalles($pId) {
        $data = array('detalles' => $this->user->detalles($pId));
        $this->load->view('plantillas/header');
        $this->load->view('/user/details_user_view', $data);
    }

    public function detallesActualizar($pId) {
        $data = array(
            'detalles' => $this->user->detalles($pId),
            'roles' => $this->user->obtenerRoles());
        $this->load->view('plantillas/header');
        $this->load->view('/user/details_user_update', $data);
    }

    public function detallesInsertar() {
        $data = array(
            'roles' => $this->user->obtenerRoles()
        );
        $this->load->view('plantillas/header');
        $this->load->view('/user/insert_user', $data);
    }

    public function detallesEliminar($pId) {
        $data = array('detalles' => $this->user->detalles($pId));
        $this->load->view('plantillas/header');
        $this->load->view('/user/details_user_delete', $data);
    }

    public function login() {
        $this->load->view('plantillas/header');
        $this->load->view('user/login');
    }

    public function delete($id) {
        $this->user->delete($id);
        $this->load->view('plantillas/header');
        redirect('user/obtenerUsers', 'refresh');
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('user/login');
    }

    public function obtenerUsers() {
        //Obtiene todos los usuarios registrados
        $data = array(
            'usuarios' => $this->user->get_all()
        );
        $this->load->view('plantillas/header');
        $this->load->view('/user/users_view', $data);
    }

    public function authenticate() {
        $contador = array(
            'usuarios' => $this->user->contarRegistrosUsuarios(),
            'estudiantes' => $this->user->contarRegistrosEstudiantes(),
            'carreras' => $this->user->contarRegistrosCarreras());
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $datos = $this->user->authenticate($username, $password);
        if ($datos) {
            $this->load->view('plantillas/header');
            $this->load->view('/user/dashboard', $contador);
        } else {
            $this->load->view('plantillas/header');
            $this->load->view('/user/login');
        }
    }

    public function actualizar() {
        $id = $this->input->post('id');
        $cedula = $this->input->post('cedula');
        $nombre = $this->input->post('nombre');
        $cmbRol = $this->input->post('rol');
        $nombreUsuario = $this->input->post('nombreusuarios');
        $password = $this->input->post('contrasenna');
        $contrasenna = md5($password);
        $user = $this->user->update($id, $cedula, $nombre, $nombreUsuario, $contrasenna, $cmbRol);
        if ($user) {
            redirect("user/obtenerUsers", "refresh");
        }
    }

    public function insert() {
        $cedula = $this->input->post('cedula');
        $nombre = $this->input->post('nombre');
        $nombreUsuario = $this->input->post('nombreusuario');
        $password = $this->input->post('contrasenna');
        $contrasenna = md5($password);
        $cmbRol = $this->input->post('roles');
        $this->user->insert_user($nombre, $cedula, $nombreUsuario, $contrasenna, $cmbRol);
        redirect("/user/obtenerUsers", "refresh");
    }

    public function dashboard() {
        $contador = array(
            'usuarios' => $this->user->contarRegistrosUsuarios(),
            'estudiantes' => $this->user->contarRegistrosEstudiantes(),
            'carreras' => $this->user->contarRegistrosCarreras());
        $username = $this->input->get('uid');
        $user = $this->user->get_user($username);
        if (!$user) {
            redirect('user/authenticate');
        } else {
            $this->load->view('user/dashboard', $contador);
        }
    }

}
