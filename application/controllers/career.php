<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Career extends CI_Controller {

    public function __construct() {

        parent::__construct();
        //Cargamos el modelo en el constructor
        $this->load->model('Career_model', 'career');
    }

    //Este metodo se encarga de mostrar la pagina principal de carreras
    public function index() {
        $user = $this->session->userdata('user');
        //Validamos si el usuario ha iniciado sesion
        if (!$user) {
            //En caso de no haber iniciados sesion lo enviamos hacia la pagina del login
            $this->load->view('plantillas/header');
            $this->load->view('user/login');
        } else {
            //En caso de si estar logueado
            //Llamamos al metodo obtener todas las carreras que esta en el modelo de carreras
            $carreras = $this->career->get_all();
            //Creamos este array que va obtener todas la carreras registradas
            $data = array('user_info' => $user,
                'carreras' => $carreras
            );
            //Cargamos la vista
            $this->load->view('careers/careers_view', $data);
        }
    }

    //Este metodo se encarga de cargar todos los registros de carreras en la base de datos
    public function obtenerCarreras() {
        $user = $this->session->userdata('user');
        //Validamos si el usuario ha iniciado sesion
        if (!$user) {
            //En caso de no haber iniciados sesion lo enviamos hacia la vista del loguin
            $this->load->view('plantillas/header');
            $this->load->view('user/login');
        } else {
            //En caso de haber iniciado sesion
            //Llamamos al metodo obtener todas las carreras que esta en el modelo de carreras
            $careers = $this->career->get_all();
            //Creamos este array que va obtener todas la carreras registradas
            $data = array(
                'user_info' => $user,
                'carreras' => $careers
            );
            //Cargamos la plantilla y la vista de las carreras
            $this->load->view('plantillas/header');
            $this->load->view('careers/careers_view', $data);
        }
    }

    //Este metodo nos permite actualizar los registros en la base de datos
    public function update() {
        $user = $this->session->userdata('user');
        //Validamos si el usuario ha inicado sesion
        if (!$user) {
            //En caso de estar loguado lo enviamos hacia la vista de loguin
            $this->load->view('plantillas/header');
            $this->load->view('user/login');
        } else {
            //En caso de ya haber iniciado sesion
            //Obtenemos los datos necesarios para la modificacion
            $id = $this->input->post('id');
            $codigo = $this->input->post('codigo');
            $nombre = $this->input->post('nombre');
            //Llamamos al metodo actualizar que esta en el modelo de carreras
            $this->career->update($id, $codigo, $nombre);
            //Una vez terminada la modificacion lo redireccionamos hacia la
            //pagina principal de las carreras
            redirect('career/obtenerCarreras', 'refresh');
        }
    }

    //Este metodo nos permite detallar una carrera en especifico
    public function detalles($pId) {
        $user = $this->session->userdata('user');
        //Validamos si el usuario ya ha iniciado sesion
        if (!$user) {
            //En caso de no haber iniciado sesion lo enviamos hacia la vista del loguin
            $this->load->view('plantillas/header');
            $this->load->view('user/login');
        } else {
            //Creamos este array que va almacenar todos los detalles referente a la carrera
            $data = array(
                'user_info' => $user,
                'detalles' => $this->career->detalles($pId)
            );
            //Se carga la plantilla y la vista
            $this->load->view('plantillas/header');
            $this->load->view('/careers/details_career_view', $data);
        }
    }

    //Este metodo nos permite mostrar el formulario correspondiente para el 
    //registro de una carrera
    public function detallesInsertar() {
        $user = $this->session->userdata('user');
        //Validamos si el usuario ha iniciado sesion
        if (!$user) {
            //En caso de no haber iniciados sesion lo enviamos hacia la vista del login
            $this->load->view('plantillas/header');
            $this->load->view('user/login');
        } else {
            //En caso de ya estar loguado
            //Creamos este array que va a obtener la informacion sobre el usuario 
            //logueado en el sistema
            $data['user_info'] = $user;
            //Cargamos la plantilla y la vista
            $this->load->view('plantillas/header');
            $this->load->view('careers/insert_career', $data);
        }
    }

    //Este metodo nos permite detallar una carrera antes de ser eliminada
    public function detallesEliminar($pId) {
        $user = $this->session->userdata('user');
        //Validamos si el usuario ha iniciado sesion
        if (!$user) {
            //En caso de no estar logueado lo enviamos hacia la vista del login
            $this->load->view('plantillas/header');
            $this->load->view('user/login');
        } else {
            //En caso de ya estar loguado en la aplicacion
            //Este array se encarga de almacenar todos los detalles referente a la carrera
            //a eliminar
            $data = array(
                'user_info' => $user,
                'detalles' => $this->career->detalles($pId)
            );
            //Cargamos la plantilla y la vista
            $this->load->view('plantillas/header');
            $this->load->view('/careers/details_career_delete', $data);
        }
    }

    //Este metodo nos permite detallar una carrera antes de su modificacion
    public function detallesModificar($pId) {
        $user = $this->session->userdata('user');
        //Validamos si el usuario ha iniciado sesion
        if (!$user) {
            //En caso de no estar loguado en la aplicacion lo enviamos hacia la vista del login
            $this->load->view('plantillas/header');
            $this->load->view('user/login');
        } else {
            //En caso de ya estar loguado en la aplicacion
            //Este array va a obtener todos los detalles refrente a la carrera
            $data = array(
                'user_info' => $user,
                'detalles' => $this->career->detalles($pId)
            );
            //Cargamos la plantilla y la vista
            $this->load->view('plantillas/header');
            $this->load->view('/careers/details_career_update', $data);
        }
    }

    //Este metodo nos permite eliminar una carrera en especifico
    public function delete($pId) {
        $user = $this->session->userdata('user');
        //Validamos si el usuario ha inicado sesion
        if (!$user) {
            //En caso de no haber inicado sesion se envia hacia la vista del login
            $this->load->view('plantillas/header');
            $this->load->view('user/login');
        } else {
            //En caso de ya estar logueado
            //Llamamos al metodo eliminar que esta en el modelo de carreras
            $this->career->delete($pId);
            //Despues de eliminar la carrera se redirecciona hacia la 
            //pagina principal de las carreras
            redirect('career/obtenerCarreras', 'refresh');
        }
    }

    //Este metodo nos permite registrar una carrera en la base de datos del sistema
    public function insert() {
        $user = $this->session->userdata('user');
        //Validamos si el usuario ha inicado sesion
        if (!$user) {
            //En caso de no haber iniciado sesion lo enviamos hacia la vista del login
            $this->load->view('plantillas/header');
            $this->load->view('user/login');
        } else {
            //En caso de ya estar loguado en el sistema
            //Obtenemos los datos necesario para registrar la carrera
            $codigo = $this->input->post('codigo');
            $nombre = $this->input->post('nombrecarrera');
            //Llamamos al metodo insertar que esta en el modelo de carreras
            $this->career->insert_career($codigo, $nombre);
            //Una vez insertado el registro se redirecciona hacia 
            //la pagina princiapl de las carreras
            redirect('career/obtenerCarreras', 'refresh');
        }
    }

}
