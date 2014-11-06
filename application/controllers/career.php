<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Career extends CI_Controller {

    public function __construct() {

        parent::__construct();
        $this->load->model('Career_model', 'career');
    }

    public function index() {
        $carreras = $this->career->get_all();
        $data = array('carreras' => $carreras);
        $this->load->view('career/index', $data);
    }

    public function actualizar() {
        $codigo = $this->input->post('codcarrera');
        $nombre = $this->input->post('nombre');
        $user = $this->update($codigo, $nombre);
        if (!$user) {
            echo 'error';
        }
    }

    public function delete() {
        $codigo = $this->input->post('codigo');
        $user = $this->career->delete($codigo);
        if (!$user) {
            echo 'error';
        }
    }

    public function insert() {
        $codigo = $this->input->post('codcarrera');
        $nombre = $this->input->post('nombre');
        $user = $this->user->insert_user($nombre, $codigo);
        if (!$user) {
            echo 'error';
        }
    }
}