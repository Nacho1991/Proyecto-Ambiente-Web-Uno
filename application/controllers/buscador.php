<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Buscador extends CI_Controller {

    public function __construct() {
        parent::__construct();
        //Abrimos el modelo en el constructor
        $this->load->model('buscador_model', 'search');
    }

    //Este metodo nos permite abrir la pagina de inicio
    //Es el index
    public function view() {
        $this->load->view('plantillas/header');
        $this->load->view('buscador/buscador_view');
    }

    //Este se encargar de mostrar los resultados
    public function resultados() {
        //Datos necesarios para realizar la busqueda
        $pFiltro = $this->input->post('filtro');
        $pTipoBusqueda = $this->input->post('opcionesBusqueda');
        //Creamos un array para almacenar los resultados de la busqueda
        $data = array(
            'tipoBusqueda' => $pTipoBusqueda,
            'resultados' => $this->search->like($pFiltro, $pTipoBusqueda)
        );
        //Abrimos la plantilla y la vista con los datos encontrados
        $this->load->view('plantillas/header');
        $this->load->view('buscador/buscador_result_view', $data);
    }

    //Este se encarga de detallar al estudiante despues
    //de mostrar los resultados de busqueda
    public function detalles($pCedula) {
        //Creamos un array para almacenar los datos necesarios para detallar
        //al estudiante
        $detalles = array(
            'estudiante' => $this->search->obtenerEstudiante($pCedula),
            'comentarios' => $this->search->obtenerComentarios($pCedula),
            'proyectos' => $this->search->obtenerProyectos($pCedula)
        );
        //Cargamos la plantilla y la vista con todos los detalles del estudiante
        $this->load->view('plantillas/header');
        $this->load->view('buscador/buscador_details_view', $detalles);
    }

}
