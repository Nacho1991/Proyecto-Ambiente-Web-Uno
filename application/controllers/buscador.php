<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Buscador extends CI_Controller {

    public function __construct() {

        parent::__construct();
        $this->load->model('buscador_model', 'search');
    }

    public function view() {
        $this->load->view('plantillas/header');
        $this->load->view('buscador/buscador_view');
    }

    public function resultados() {
        $pFiltro = $this->input->post('filtro');
        $pTipoBusqueda = $this->input->post('opcionesBusqueda');
        $data = array(
            'tipoBusqueda' => $pTipoBusqueda,
            'resultados' => $this->search->like($pFiltro, $pTipoBusqueda)
        );
        $this->load->view('plantillas/header');
        $this->load->view('buscador/buscador_result_view', $data);
    }

    public function detalles($pCedula) {
        $detalles = array(
            'estudiante' => $this->search->obtenerEstudiante($pCedula),
            'comentarios' => $this->search->obtenerComentarios($pCedula),
            'proyectos' => $this->search->obtenerProyectos($pCedula)
        );
        $this->load->view('plantillas/header');
        $this->load->view('buscador/buscador_details_view', $detalles);
    }

}
