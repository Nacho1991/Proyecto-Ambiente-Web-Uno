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

}
