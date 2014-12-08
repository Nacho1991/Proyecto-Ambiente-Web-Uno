<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Student extends CI_Controller {

    public function __construct() {
        parent::__construct();
        //Cargamos el modelo
        $this->load->model('Student_model', 'student');
    }

    //Creamos el metodo del index
    public function index() {
        $user = $this->session->userdata('user');
        //Validamos si la sesión ya esta iniciada
        if (!$user) {
            //En caso de no estar logueado lo devuelve a la parte del login
            $this->load->view('plantillas/header');
            $this->load->view('user/login');
        } else {
            //Si se encuentra logueado
            //Creamos una variable que va almacenar todos los registros de los estudaintes
            $students = $this->student->get_all();
//            Creamos un arreglo que va almacenar:
//            La informacion del usuario logueado y la de todos los estudiantes
            $data = array(
                'user_info' => $user,
                'estudiantes' => $students
            );
            //Abrimos la vista que contiene la lista de todos los estudiantes
            $this->load->view('student/students_view', $data);
        }
    }

    //Este nos permite obtener todos los estudiantes
    //registrados en la base de datos
    public function obtenerStudents() {
        $user = $this->session->userdata('user');
        //Validamos si el usuario esta logueado
        if (!$user) {
            //En caso de no estarlo lo envia a la vista del login
            $this->load->view('plantillas/header');
            $this->load->view('user/login');
        } else {
            //En caso de estar logueado
            //Esta variable guarda los registros de todos los estudiantes
            //que estan en la base de datos
            $students = $this->student->get_all();
            //Creamos este array que almacena los datos del usuario logueado
            //y los registros de todos los estudiantes que estan en la base de detos
            $data = array(
                'user_info' => $user,
                'estudiantes' => $students
            );
            //Cargamos la plantilla y la vista
            $this->load->view('plantillas/header');
            $this->load->view('students/students_view', $data);
        }
    }

    //Este metodo nos permite detallar al estudiante al que
    //se desea modificiar
    public function detallesModificar($pId, $pCedula) {
        $user = $this->session->userdata('user');
        //Validamos si el usuario se encuentra logueado
        if (!$user) {
            //En caso de no estarlo lo devuelve para la vista del login
            $this->load->view('plantillas/header');
            $this->load->view('user/login');
        } else {
            //En caso de ya estar logueado
            //Esta variable nos permite alamcenar todos los datos relacionados
            //con el estudiante
            $data = array(
                'user_info' => $user,
                'detalles' => $this->student->detalles($pId),
                'skills' => $this->student->obtenerSkills(),
                'carreras' => $this->student->obtenerCarreras(),
                'comentarios' => $this->student->obtenerComentarios($pCedula),
                'proyectos' => $this->student->obtenerProyectos($pCedula)
            );
            //Cargamos la plantilla y la vista con todos los detalles para modificar
            //al estudiante
            $this->load->view('plantillas/header');
            $this->load->view('/students/details_student_update', $data);
        }
    }

    //Este metodo nos permite cargar datos para registrar al estudiante
    public function detallesInsertar() {
        $user = $this->session->userdata('user');
        //Validamos si el usuario esta loguado
        if (!$user) {
            //En caso de no estarlo lo devuelve hacia la vista del login
            $this->load->view('plantillas/header');
            $this->load->view('user/login');
        } else {
            //En caso de ya estar loguado
            //Esta variable se encargar de almacenar los datos necesarios
            //para poder registrar al estudiante
            $habilidades = array(
                'user_info' => $user,
                'skills' => $this->student->obtenerSkills(),
                'carreras' => $this->student->obtenerCarreras(),
                'tecnologias' => $this->student->obtenerTecnologias(),
                'cursos' => $this->student->obtenerCursos()
            );
            //Cargamos la plantilla y la vista
            $this->load->view('/plantillas/header');
            $this->load->view('students/insert_student', $habilidades);
        }
    }

    //Este metodo nos permite detallar al estudiante antes de ser eliminado
    public function detallesEliminar($pId, $pCedula) {
        $user = $this->session->userdata('user');
        //Validamos si el usuario se encuantra logueado en la aplicacion web
        if (!$user) {
            //En caso de no estarlo lo devuelve hacia la vista del login
            $this->load->view('plantillas/header');
            $this->load->view('user/login');
        } else {
            //En caso de estar loguado en la aplicacion web
            //Este array se encarga de almacenar todos los detalles relacionados con el estudiante
            $data = array(
                'user_info' => $user,
                'detalles' => $this->student->detalles($pId),
                'skills' => $this->student->obtenerSkills(),
                'carreras' => $this->student->obtenerCarreras(),
                'comentarios' => $this->student->obtenerComentarios($pCedula),
                'proyectos' => $this->student->obtenerProyectos($pCedula)
            );
            //Validamos si el array viene sin datos
            if ($data) {
                //En caso de estar con registros, carga la vista con todos ellos
                $this->load->view('/plantillas/header');
                $this->load->view('students/details_student_delete', $data);
            } else {
                //En caso contrario lo devuelve a la vista principal de estudiantes
                redirect("student/obtenerStudents", "refresh");
            }
        }
    }

    //Este metodo se encarga de extraer todos los datos relacionados con el estudiante
    public function detalles($pId, $pCedula) {
        $user = $this->session->userdata('user');
        //Validamos si el usuario ya esta logueado en la aplicacion
        if (!$user) {
            //En caso de no estarlo lo devuelve hacia la vista del login
            $this->load->view('plantillas/header');
            $this->load->view('user/login');
        } else {
            //En caso de estar loguado en la aplicacion web
            //Este arreglo se encarga de almacenar todos los datos necesarios
            //para detallar al estudiante
            $data = array(
                'user_info' => $user,
                'detalles' => $this->student->detalles($pId),
                'skills' => $this->student->obtenerSkills(),
                'carreras' => $this->student->obtenerCarreras(),
                'comentarios' => $this->student->obtenerComentarios($pCedula),
                'proyectos' => $this->student->obtenerProyectos($pCedula)
            );
            //Validamos si existen datos relacionados con el estudiante
            if ($data) {
                //En caso de haber datos lo envia para la vista de detalles de estudiante
                //con los datos necesarios
                $this->load->view('/plantillas/header');
                $this->load->view('students/details_student_view', $data);
            } else {
                //En caso de no haber datos lo devuelve a la vista principal de estudiantes
                redirect("student/obtenerStudents", "refresh");
            }
        }
    }

    //Este metodo se encarga de actualizar al estudiante
    public function actualizar() {
        $user = $this->session->userdata('user');
        //Validamos si el usuario ha iniciado sesion
        if (!$user) {
            //En caso de no estar logueado en la aplicacion lo devuelve a la vista del login
            $this->load->view('plantillas/header');
            $this->load->view('user/login');
        } else {
            //En caso de ya estar logueado
            //Se alamcenan en las variables todos los datos necesarios para la 
            //modificacion del registro
            $id = $this->input->post('id');
            $cedula = $this->input->post('cedula');
            $nombre = $this->input->post('nombre');
            $nivelIngles = $this->input->post('ingles');
            $habilidades = $this->input->post('habilidades');
            $carrera = $this->input->post('carreras');
            //Llamamos al metodo update que se encuentra en el modelo de estudiante
            //y se le envian los parametros suficientes para la modificacion del registro
            $this->student->update($id, $cedula, $nombre, $carrera, $nivelIngles, $habilidades);
            //Una vez hecho la modificacion se redirecciona para la pagina principal de los estudiantes
            redirect("student/obtenerStudents", "refresh");
        }
    }

    //Este metod se encarga de eliminar al estudiante seleccionado
    public function delete() {
        $user = $this->session->userdata('user');
        //Validamos si el usuario ha iniciado sesion
        if (!$user) {
            //En caso de no estar loguado lo devuelve hacia la vista del login
            $this->load->view('plantillas/header');
            $this->load->view('user/login');
        } else {
            //En caso de estar loguado
            //Esta variable obtiene el numero de cedula del estudiante a eliminar
            $cedula = $this->input->post('cedula');
            //Llamamos al metodo de eliminar que esta en el modelo de estudiantes
            $this->student->delete($cedula);
            //Una vez eliminado el estudiante se redirecciona hacia la 
            //pagina principal de estudiantes
            redirect("student/obtenerStudents", "refresh");
        }
    }

    //Este metodo nos permite cargar los datos necesaros para asociar 
    //un proyecto a un estudiante
    public function proyecto($pId) {
        $user = $this->session->userdata('user');
        //Validamos si el usurio se encuentra loguado en la apliacion web
        if (!$user) {
            //En caso de no estarlo lo envia hacia la vista del login
            $this->load->view('plantillas/header');
            $this->load->view('user/login');
        } else {
            //En caso de ya estar logueado
            //Este array almacena todos los datos necesarios para registrar un proyecto
            $data = array(
                'user_info' => $user,
                'detalles' => $this->student->detalles($pId),
                'tecnologias' => $this->student->obtenerTecnologias(),
                'cursos' => $this->student->obtenerCursos()
            );
            //Cargamos la plantilla y la vista 
            $this->load->view('plantillas/header');
            $this->load->view('students/student_proyect', $data);
        }
    }

    //Este metodo nos permite registrar el proyecto a 
    //un estudiante ya existente
    public function insertProyecto() {
        //Validamos si la sesión esta iniciada
        $user = $this->session->userdata('user');
        if (!$user) {
            //En caso de no estarlo lo envia hacia la vista del login
            $this->load->view('plantillas/header');
            $this->load->view('user/login');
        } else {
            //En caso de ya estar loguado
            //Se obtienen los datos necesarios para el registro del proyecto
            $id = $this->input->post('id');
            $cedula = $this->input->post('cedula');
            //Datos del proyecto
            $duracion = $this->input->post('duracion');
            $list = $this->input->post('tecnologias');
            $tecnologias = implode(", ", $list);
            $cursos = $this->input->post('cursos');
            $descripcion = $this->input->post('descripcion');
            $fecha = $this->input->post('fecha');
            $calificacion = $this->input->post('calificacion');
            //Hacemos el insert en la base de datos
            $this->student->insertProyect($cedula, $cursos, $duracion, $descripcion, $calificacion, $tecnologias, $fecha);
            //Re direccionamos y refrescamos la pagina con los parametros necesarios
            redirect("student/detallesModificar/" . $id . "/" . $cedula, "refresh");
        }
    }

    //Este metodo nos permite mostrar los detalles necesarios para 
    //registrar un nuevo comentario hacia un estudiante 
    public function comment($pId) {
        $user = $this->session->userdata('user');
        //Validamos si el usuario ya esta logueado en la aplicacion web
        if (!$user) {
            //En caso de no estarlo lo devuelve hacia la vista del login
            $this->load->view('plantillas/header');
            $this->load->view('user/login');
        } else {
            //En caso de ya estar logueado
            //Se crea un array con los detalles necesarios para registrar el comentario
            $data = array(
                'user_info' => $user,
                'detalles' => $this->student->detalles($pId),
            );
            //Cargamos la plantilla y la vista para hacer el comentario
            $this->load->view('plantillas/header');
            $this->load->view('students/student_comment', $data);
        }
    }

    //Este metodo nos permite registrar el comentario realizado al estudiante
    public function insertComment() {
        //Validamos si la sesión ya esta iniciada
        $user = $this->session->userdata('user');
        if (!$user) {
            //En caso de nos estarlo lo envia hacia el login
            $this->load->view('plantillas/header');
            $this->load->view('user/login');
        } else {
            //En caso de ya estar loguado en la aplicacion web
            $id = $this->input->post('id');
            $cedula = $this->input->post('cedula');
            //Datos del comentario
            $nombreProfesor = $this->input->post('nombreProfesor');
            $fechaProfesor = $this->input->post('fechaProfesor');
            $comentario = $this->input->post('comentarioProfesor');
            //Hacemos el insert en la base de datos
            $this->student->insertComment($cedula, $nombreProfesor, $fechaProfesor, $comentario);
            //Re direccionamos y le enviamos los parametros necesarios
            redirect("student/detallesModificar/" . $id . "/" . $cedula, "refresh");
        }
    }

    //Este metodo nos permite registrar a un estudiante en la base de datos
    public function insert() {
        $user = $this->session->userdata('user');
        //Validamos si el usuario ya ha inciado sesión
        if (!$user) {
            //En caso de no estarlo lo envia hacia la vista del login
            $this->load->view('plantillas/header');
            $this->load->view('user/login');
        } else {
            //En caso de estar ya loguado en la aplicacion web
            //Se recogen los datos necesarios en las variables
            $cedula = $this->input->post('cedula');
            $nombre = $this->input->post('nombre');
            $nivelIngles = $this->input->post('ingles');
            $habilidades = $this->input->post('habilidades');
            $carrera = $this->input->post('carreras');
            //Llamamos al metodo insertar estudiante que se encuentra en el modelo de estudiantes
            $this->student->insert_student($nombre, $cedula, $carrera, $nivelIngles, $habilidades);


            //Datos del proyecto a registrar

            $duracion = $this->input->post('duracion');
            $cursos = $this->input->post('cursos');
            $descripcion = $this->input->post('descripcion');
            $calificacion = $this->input->post('calificacion');
            $list = $this->input->post('tecnologias');
            $tecnologias = implode(", ", $list);
            $fecha = $this->input->post('fecha');
            //Llamamos al metodo de insertar proyecto que esta en el modelo de estudiantes
            $this->student->insertarProyecto($cedula, $cursos, $duracion, $descripcion, $calificacion, $tecnologias, $fecha);

            //Datos del profesor

            $nombreProfesor = $this->input->post('nombreProfesor');
            $fechaProfesor = $this->input->post('fechaProfesor');
            $comentario = $this->input->post('comentarioProfesor');
            //Llamamos al metodo de insertar comentario que esta en el modelo de estudiantes
            $this->student->insertarComentario($cedula, $nombreProfesor, $fechaProfesor, $comentario);

            //Una vez registrando todos los datos necesarios se redirecciona hacia 
            //la pagina princiapal de estduaintes 
            redirect("student/obtenerStudents", "refresh");
        }
    }

}
