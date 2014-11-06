<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Student extends CI_Controller {

    public function __construct() {

        parent::__construct();
        $this->load->model('Student_model', 'student');
    }

    public function index() {
        $users = $this->student->get_all();
        $data = array('estudiante' => $users);
        $this->load->view('student/index', $data);
    }

    public function actualizar() {
        $cedula = $this->input->post('cedula');
        $nombre = $this->input->post('nombre');
        $nivelIngles = $this->input->post('nivelingles');
        $habilidades = $this->input->post('habilidades');
        $carrera = $this->input->post('carrera');
        $user = $this->update($cedula, $nombre, $cedula, $carrera, $nivelIngles,$habilidades);
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
        $nivelIngles = $this->input->post('nivelingles');
        $habilidades = $this->input->post('habilidades');
        $carrera = $this->input->post('carrera');
        $user = $this->user->insert_user($nombre, $cedula, $carrera, $nivelIngles, $habilidades);
        if (!$user) {
            echo 'error';
        }
    }
}

