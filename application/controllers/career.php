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
        $this->load->view('careers/careers_view', $data);
    }

    public function obtenerCarreras() {
        $careers = $this->career->get_all();
        $data = array(
            'carreras' => $careers
        );
        $this->load->view('plantillas/header');
        $this->load->view('careers/careers_view', $data);
    }

    public function update() {
        $id = $this->input->post('id');
        $codigo = $this->input->post('codigo');
        $nombre = $this->input->post('nombre');
        $this->career->update($id, $codigo, $nombre);
        redirect('career/obtenerCarreras', 'refresh');
    }

    public function detalles($pId) {
        $data = array('detalles' => $this->career->detalles($pId));
        $this->load->view('plantillas/header');
        $this->load->view('/careers/details_career_view', $data);
    }

    public function detallesInsertar() {
        $this->load->view('plantillas/header');
        $this->load->view('careers/insert_career');
    }

    public function detallesEliminar($pId) {
        $data = array('detalles' => $this->career->detalles($pId));
        $this->load->view('plantillas/header');
        $this->load->view('/careers/details_career_delete', $data);
    }

    public function detallesModificar($pId) {
        $data = array('detalles' => $this->career->detalles($pId));
        $this->load->view('plantillas/header');
        $this->load->view('/careers/details_career_update', $data);
    }

    public function delete($pId) {
        $this->career->delete($pId);
        redirect('career/obtenerCarreras', 'refresh');
    }

    public function insert() {
        $codigo = $this->input->post('codigo');
        $nombre = $this->input->post('nombrecarrera');
        $this->career->insert_career($codigo, $nombre);
        redirect('career/obtenerCarreras', 'refresh');
    }

}
