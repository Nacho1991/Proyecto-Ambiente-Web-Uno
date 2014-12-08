<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct() {

        parent::__construct();
        //Cargamos el modelo
        $this->load->model('User_model', 'user');
    }

    //Es el index de los usuarios
    public function index() {
        $user = $this->session->userdata('user');
        if (!$user) {
            $this->load->view('plantillas/header');
            $this->load->view('user/login');
        } else {
            $contador = array(
                'user_info' => $user,
                'usuarios' => $this->user->contarRegistrosUsuarios(),
                'estudiantes' => $this->user->contarRegistrosEstudiantes(),
                'carreras' => $this->user->contarRegistrosCarreras());
            $this->load->view('plantillas/header');
            $this->load->view('user/dashboard', $contador);
        }
    }

    //Este metodo permite detallar a los usuarios registrados en la base de datos
    public function detalles($pId) {
        $user = $this->session->userdata('user');
        //Validamos si el usuario ha iniciado sesion
        if (!$user) {
            //En caso de nos estar loguado lo devuelve hacia la vista del login
            $this->load->view('plantillas/header');
            $this->load->view('user/login');
        } else {
            //En caso de haber iniciado sesion
            //Este arreglo almacena todos los detalles de un usuario
            $data = array('user_info' => $user,
                'detalles' => $this->user->detalles($pId)
            );
            //Cargamos la plantilla y la vista
            $this->load->view('plantillas/header');
            $this->load->view('/user/details_user_view', $data);
        }
    }

    //Este metodo nos permite detallar al usuario antes de modificarlos
    public function detallesActualizar($pId) {
        $user = $this->session->userdata('user');
        //Validamos si el usuario ha iniciado sesion
        if (!$user) {
            //En caso de no estar loguado lo envia hacia la vista del login
            $this->load->view('plantillas/header');
            $this->load->view('user/login');
        } else {
            //En caso de estar loguado
            //Este arreglo almacena todos los datos necesario para editar al usuario
            $data = array(
                'user_info' => $user,
                'detalles' => $this->user->detalles($pId),
                'roles' => $this->user->obtenerRoles());
            //Se cargar la plantilla y la vista
            $this->load->view('plantillas/header');
            $this->load->view('/user/details_user_update', $data);
        }
    }

    //Este metodo nos permite cargar datos necesarios para registrar a un usuario
    public function detallesInsertar() {
        $user = $this->session->userdata('user');
        //Validamos si el usuario ha iniciado sesion
        if (!$user) {
            //En caso de haber iniciado sesion se envia hacia la vista del login
            $this->load->view('plantillas/header');
            $this->load->view('user/login');
        } else {
            //En caso de estarlo
            //Este arreglo alamacena todos los datos necesarios para registrar un usuario
            $data = array(
                'user_info' => $user,
                'roles' => $this->user->obtenerRoles()
            );
            //Cargamos la plantilla y la vista
            $this->load->view('plantillas/header');
            $this->load->view('/user/insert_user', $data);
        }
    }

    //Este metodo nos permite detallar a un usuario antes de eliminarlo
    public function detallesEliminar($pId) {
        $user = $this->session->userdata('user');
        //Validamos si el usuario ha iniciado sesion
        if (!$user) {
            //En caso de no estarlo se envia hacia la vista del login
            $this->load->view('plantillas/header');
            $this->load->view('user/login');
        } else {
            //En caso de si estar loguado
            //Este arreglo almacena todos los datos relacionados con el usuario a eliminar
            $data = array(
                'user_info' => $user,
                'detalles' => $this->user->detalles($pId)
            );
            //Se carga la plantilla y la vista
            $this->load->view('plantillas/header');
            $this->load->view('/user/details_user_delete', $data);
        }
    }

    //Este metodo nos permite mostrar la vista del login
    public function login() {
        $this->load->view('plantillas/header');
        $this->load->view('user/login');
    }

    //Este metodo nos permite eliminar a un usuario seleccionado
    public function delete($id) {
        $user = $this->session->userdata('user');
        //Validamos si el usuario ha iniciados sesion
        if (!$user) {
            //En caso de nos estarlo se envia hacia la vista del login
            $this->load->view('plantillas/header');
            $this->load->view('user/login');
        } else {
            //En caso de estar loguado
            //Se llama al metodo eliminar que se encuentra en el modelo de usuarios
            $this->user->delete($id);
            //Una vez eliminado el usuario se carga la plantilla y la vista princiapl
            $this->load->view('plantillas/header');
            redirect('user/obtenerUsers', 'refresh');
        }
    }

    //Este metodo nos permite cerrar la sesion de forma segura
    public function logout() {
        //Destruimos la sesion con este metodo
        $this->session->sess_destroy();
        //Redireccionamos hacia el login
        redirect("/user/login");
    }

    //Este metodo nos permite extraer todos los usuario registrados en la base de datos
    public function obtenerUsers() {
        $user = $this->session->userdata('user');
        //Validamos si el usuario ya esta logueado en la aplicacion
        if (!$user) {
            //En caso de no estar loguado se envia hacia la vista del login
            $this->load->view('plantillas/header');
            $this->load->view('user/login');
        } else {
            //En caso de si estar loguado
            //Este arreglo almacena todos los usuarios registrados
            $data = array(
                'user_info' => $user,
                'usuarios' => $this->user->get_all()
            );
            //Cargamos la plantilla y la vista
            $this->load->view('plantillas/header');
            $this->load->view('/user/users_view', $data);
        }
    }

    //Este metodo nos permite auntenticarnos en la aplicacion para el inicio de seion
    public function authenticate() {
        //Variables necesarios para el logueo
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        // llamamos al modelo User y el método de authenticate
        $user = $this->user->authenticate($username, $password);
        //Validamos si existe el usuario
        if ($user) {
            //En caso de existir se envia esos datos para mantener la sesion abierta
            $this->session->set_userdata('user', $user);
            //Este arreglo alamcena todos los datos informativos de forma general de los registros
            $contador = array(
                'user_info' => $user,
                'usuarios' => $this->user->contarRegistrosUsuarios(),
                'estudiantes' => $this->user->contarRegistrosEstudiantes(),
                'carreras' => $this->user->contarRegistrosCarreras()
            );
            //Cargamos la plantilla y la vista
            $this->load->view('plantillas/header');
            $this->load->view('/user/dashboard', $contador);
        } else {
            //En caso de no existir un usuario se envia nuevamente hacia la vista del login
            $this->load->view('plantillas/header');
            $this->load->view('/user/login');
        }
    }

    //Este metodo nos permite actualizar los registros de un usuario en especifico
    public function actualizar() {
        $user = $this->session->userdata('user');
        //Validamos si el usuario ya inicio sesion
        if (!$user) {
            //En caso de haber iniciado sesion se envia hacia la vista del login
            $this->load->view('plantillas/header');
            $this->load->view('user/login');
        } else {
            //Los datos necesario para la edicion
            $id = $this->input->post('id');
            $cedula = $this->input->post('cedula');
            $nombre = $this->input->post('nombre');
            $cmbRol = $this->input->post('rol');
            $nombreUsuario = $this->input->post('nombreusuarios');
            $password = $this->input->post('contrasenna');
            //Encirptamos la contraseña modificada
            $contrasenna = md5($password);
            //Llamamos al metodo actualizar que se encuantra en el modelo de usuarios
            $user = $this->user->update($id, $cedula, $nombre, $nombreUsuario, $contrasenna, $cmbRol);
            //Validamos si tuvo exito la edicion del registro
            if ($user) {
                //Redireccionamos a la pagina principal de usuarios
                redirect("user/obtenerUsers", "refresh");
            }
        }
    }

    //Este metodo nos permite insertar registros de un usuario
    public function insert() {
        $user = $this->session->userdata('user');
        //Validamos si el usuario ha iniciado sesion
        if (!$user) {
            //En caso de no estar loguado en la aplicacion
            //lo enviamos hacia la vista del login
            $this->load->view('plantillas/header');
            $this->load->view('user/login');
        } else {
            //En caso de estar logueado se guardan los datos necesarios en la variables
            $cedula = $this->input->post('cedula');
            $nombre = $this->input->post('nombre');
            $nombreUsuario = $this->input->post('nombreusuario');
            $password = $this->input->post('contrasenna');
            $verificaPassword = $this->input->post('verificarcontrasenna');
            //Encriptamos la contraseña
            $contrasenna = md5($password);
            $cmbRol = $this->input->post('roles');
            //Validamos si las contraseña coinciden
            if ($password === $verificaPassword) {
                //Si coinciden llamamos al metodor insertar usuario que esta en el modelo de usuarios
                $this->user->insert_user($nombre, $cedula, $nombreUsuario, $contrasenna, $cmbRol);
                //Una vez hecho el registro redireccionamos hacia la pagina principal de usuarios
                redirect("/user/obtenerUsers", "refresh");
            } else {
                //En caso de no coincidir refrescamos la pagina
                redirect("/user/detallesInsertar");
            }
        }
    }

    //Este metodo nos permite mostrar la pagina principal con pequeños datos
    public function dashboard() {
        $user = $this->session->userdata('user');
        //Validamos si el usuario ha iniciado sesion
        if (!$user) {
            //En caso de no estarlo se redirecciona hacia la vista del login
            $this->load->view('plantillas/header');
            $this->load->view('user/login');
        } else {
            //En caso de estar ya loguado en la aplicacion
            //Este arreglo alamcena todos los detalles necesarios sobre los registros de la base de datos
            $data = array(
                'user_info' => $user,
                'usuarios' => $this->user->contarRegistrosUsuarios(),
                'estudiantes' => $this->user->contarRegistrosEstudiantes(),
                'carreras' => $this->user->contarRegistrosCarreras());
            //Cargamos la plantilla y la vista
            $this->load->view('user/dashboard', $data);
        }
    }

}
