<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct() {

        parent::__construct();
        $this->load->model('User_model', 'user');
    }

    public function index() {
        $users = $this->user->get_all();
        $data = array('usuarios' => $users);
        $this->load->view('plantillas/header');
        $this->load->view('user/dashboard', $data);
    }

    public function login() {
        $this->load->view('plantillas/header');
        $this->load->view('user/login');
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
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        // llamamos al modelo User y el método de authenticate
        $user = $this->user->authenticate($username, $password);
        if ($user) {
            $this->load->view('plantillas/header');
            $this->load->view('/user/dashboard');
        } else {
            $this->load->view('plantillas/header');
            $this->load->view('user/login');
        }
    }

    public function actualizar() {
        $cedula = $this->input->post('cedula');
        $nombre = $this->input->post('nombre');
        $role = $this->input->post('role');
        $nombreUsuario = $this->input->post('nombreusuario');
        $contrasenna = $this->input->post('contrasenna');
        $user = $this->update($cedula, $nombre, $nombreUsuario, $contrasenna, $role);
        if (!$user) {
            echo 'error';
        }
    }

    public function delete() {
        $cedula = $this->input->post('cedula');
        $user = $this->user->delete($cedula);
        if (!$user) {
            echo 'error';
        }
    }

    public function insert() {
        $cedula = $this->input->post('cedula');
        $nombre = $this->input->post('nombre');
        $role = $this->input->post('role');
        $nombreUsuario = $this->input->post('nombreusuario');
        $contrasenna = $this->input->post('contrasenna');
        $user = $this->user->insert_user($nombre, $cedula, $nombreUsuario, $contrasenna, $role);
        if (!$user) {
            echo 'error';
        }
    }

    public function dashboard() {

        $username = $this->input->get('uid');
        $user = $this->user->get_user($username);
        $data['user_info'] = $user;
        $data['title'] = 'Title';
        $this->load->view('user/dashboard', $data);
    }

}
