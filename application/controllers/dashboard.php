<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('validacion');
    }

    public function index() {
        $this->load->view('plantillas/header');
        $this->load->view('dashboardusuario');
    }


    public function usuariomodificar() {
        $this->load->view('plantillas/header');
        $this->load->view('usuarios/usuariomodificar');
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */