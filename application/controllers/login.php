<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller {

    public function index() {
        $this->load->view('plantillas/header');
        $this->load->view('login_usuario');
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */