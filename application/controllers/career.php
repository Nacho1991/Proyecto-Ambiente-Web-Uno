<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Career extends CI_Controller {

    public function __construct() {

        parent::__construct();
        $this->load->model('Career_model', 'career');
    }

    public function index() {
        $user = $this->session->userdata('user');
        if (!$user) {
            $this->load->view('plantillas/header');
            $this->load->view('user/login');
        } else {
            $carreras = $this->career->get_all();
            $data = array('user_info' => $user,
                'carreras' => $carreras
            );
            $this->load->view('careers/careers_view', $data);
        }
    }

    public function obtenerCarreras() {
        $user = $this->session->userdata('user');
        if (!$user) {
            $this->load->view('plantillas/header');
            $this->load->view('user/login');
        } else {
            $careers = $this->career->get_all();
            $data = array(
                'user_info' => $user,
                'carreras' => $careers
            );
            $this->load->view('plantillas/header');
            $this->load->view('careers/careers_view', $data);
        }
    }

    public function update() {
        $user = $this->session->userdata('user');
        if (!$user) {
            $this->load->view('plantillas/header');
            $this->load->view('user/login');
        } else {
            $id = $this->input->post('id');
            $codigo = $this->input->post('codigo');
            $nombre = $this->input->post('nombre');
            $this->career->update($id, $codigo, $nombre);
            redirect('career/obtenerCarreras', 'refresh');
        }
    }

    public function detalles($pId) {
        $user = $this->session->userdata('user');
        if (!$user) {
            $this->load->view('plantillas/header');
            $this->load->view('user/login');
        } else {
            $data = array(
                'user_info' => $user,
                'detalles' => $this->career->detalles($pId)
            );
            $this->load->view('plantillas/header');
            $this->load->view('/careers/details_career_view', $data);
        }
    }

    public function detallesInsertar() {
        $user = $this->session->userdata('user');
        if (!$user) {
            $this->load->view('plantillas/header');
            $this->load->view('user/login');
        } else {
            $data['user_info']=$user;
            $this->load->view('plantillas/header');
            $this->load->view('careers/insert_career',$data);
        }
    }

    public function detallesEliminar($pId) {
        $user = $this->session->userdata('user');
        if (!$user) {
            $this->load->view('plantillas/header');
            $this->load->view('user/login');
        } else {
            $data = array(
                'user_info' => $user,
                'detalles' => $this->career->detalles($pId)
            );
            $this->load->view('plantillas/header');
            $this->load->view('/careers/details_career_delete', $data);
        }
    }

    public function detallesModificar($pId) {
        $user = $this->session->userdata('user');
        if (!$user) {
            $this->load->view('plantillas/header');
            $this->load->view('user/login');
        } else {
            $data = array(
                'user_info'=>$user,
                'detalles' => $this->career->detalles($pId)
                    );
            $this->load->view('plantillas/header');
            $this->load->view('/careers/details_career_update', $data);
        }
    }

    public function delete($pId) {
        $user = $this->session->userdata('user');
        if (!$user) {
            $this->load->view('plantillas/header');
            $this->load->view('user/login');
        } else {
            $this->career->delete($pId);
            redirect('career/obtenerCarreras', 'refresh');
        }
    }

    public function insert() {
        $user = $this->session->userdata('user');
        if (!$user) {
            $this->load->view('plantillas/header');
            $this->load->view('user/login');
        } else {
            $codigo = $this->input->post('codigo');
            $nombre = $this->input->post('nombrecarrera');
            $this->career->insert_career($codigo, $nombre);
            redirect('career/obtenerCarreras', 'refresh');
        }
    }

}
