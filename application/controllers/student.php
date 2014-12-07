<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Student extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Student_model', 'student');
    }

    public function index() {
        $user = $this->session->userdata('user');
        if (!$user) {
            $this->load->view('plantillas/header');
            $this->load->view('user/login');
        } else {
            $students = $this->student->get_all();
            $data = array(
                'estudiantes' => $students
            );
            $this->load->view('student/students_view', $data);
        }
    }

    public function obtenerStudents() {
        $user = $this->session->userdata('user');
        if (!$user) {
            $this->load->view('plantillas/header');
            $this->load->view('user/login');
        } else {
            $students = $this->student->get_all();
            $data = array(
                'estudiantes' => $students
            );
            $this->load->view('plantillas/header');
            $this->load->view('students/students_view', $data);
        }
    }

    public function asociarProyecto() {
        $this->load->view('/plantillas/header');
        $this->load->view('students/details_insert_proyect');
    }

    public function detallesModificar($pId, $pCedula) {
        $user = $this->session->userdata('user');
        if (!$user) {
            $this->load->view('plantillas/header');
            $this->load->view('user/login');
        } else {
            $data = array(
                'detalles' => $this->student->detalles($pId),
                'skills' => $this->student->obtenerSkills(),
                'carreras' => $this->student->obtenerCarreras(),
                'comentarios' => $this->student->obtenerComentarios($pCedula),
                'proyectos' => $this->student->obtenerProyectos($pCedula)
            );
            $this->load->view('plantillas/header');
            $this->load->view('/students/details_student_update', $data);
        }
    }

    public function detallesInsertar() {
        $user = $this->session->userdata('user');
        if (!$user) {
            $this->load->view('plantillas/header');
            $this->load->view('user/login');
        } else {
            $habilidades = array(
                'skills' => $this->student->obtenerSkills(),
                'carreras' => $this->student->obtenerCarreras(),
                'tecnologias' => $this->student->obtenerTecnologias(),
                'cursos' => $this->student->obtenerCursos()
            );
            $this->load->view('/plantillas/header');
            $this->load->view('students/insert_student', $habilidades);
        }
    }

    public function detallesEliminar($pId, $pCedula) {
        $user = $this->session->userdata('user');
        if (!$user) {
            $this->load->view('plantillas/header');
            $this->load->view('user/login');
        } else {
            $data = array(
                'detalles' => $this->student->detalles($pId),
                'skills' => $this->student->obtenerSkills(),
                'carreras' => $this->student->obtenerCarreras(),
                'comentarios' => $this->student->obtenerComentarios($pCedula),
                'proyectos' => $this->student->obtenerProyectos($pCedula)
            );
            if ($data) {
                $this->load->view('/plantillas/header');
                $this->load->view('students/details_student_delete', $data);
            } else {
                redirect("student/obtenerStudents", "refresh");
            }
        }
    }

    public function detalles($pId, $pCedula) {
        $user = $this->session->userdata('user');
        if (!$user) {
            $this->load->view('plantillas/header');
            $this->load->view('user/login');
        } else {
            $data = array(
                'detalles' => $this->student->detalles($pId),
                'skills' => $this->student->obtenerSkills(),
                'carreras' => $this->student->obtenerCarreras(),
                'comentarios' => $this->student->obtenerComentarios($pCedula),
                'proyectos' => $this->student->obtenerProyectos($pCedula)
            );
            if ($data) {
                $this->load->view('/plantillas/header');
                $this->load->view('students/details_student_view', $data);
            } else {
                redirect("student/obtenerStudents", "refresh");
            }
        }
    }

    public function actualizar() {
        $user = $this->session->userdata('user');
        if (!$user) {
            $this->load->view('plantillas/header');
            $this->load->view('user/login');
        } else {
            $id = $this->input->post('id');
            $cedula = $this->input->post('cedula');
            $nombre = $this->input->post('nombre');
            $nivelIngles = $this->input->post('ingles');
            $habilidades = $this->input->post('habilidades');
            $carrera = $this->input->post('carreras');
            $this->student->update($id, $cedula, $nombre, $carrera, $nivelIngles, $habilidades);
            redirect("student/obtenerStudents", "refresh");
        }
    }

    public function delete() {
        $user = $this->session->userdata('user');
        if (!$user) {
            $this->load->view('plantillas/header');
            $this->load->view('user/login');
        } else {
            $cedula = $this->input->post('cedula');
            $this->student->delete($cedula);
            redirect("student/obtenerStudents", "refresh");
        }
    }

    public function proyecto($pId) {
        $user = $this->session->userdata('user');
        if (!$user) {
            $this->load->view('plantillas/header');
            $this->load->view('user/login');
        } else {
            $data = array(
                'detalles' => $this->student->detalles($pId),
                'tecnologias' => $this->student->obtenerTecnologias(),
                'cursos' => $this->student->obtenerCursos()
            );
            $this->load->view('plantillas/header');
            $this->load->view('students/student_proyect', $data);
        }
    }
    public function insertProyecto(){
        //Validamos si la sesión esta iniciada
        $user = $this->session->userdata('user');
        if (!$user) {
            $this->load->view('plantillas/header');
            $this->load->view('user/login');
        } else {
            $id = $this->input->post('id');
            $cedula = $this->input->post('cedula');
            //Datos del proyecto
            $duracion=$this->input->post('duracion');
            $list = $this->input->post('tecnologias');
            $tecnologias = implode(", ", $list);
            $cursos=$this->input->post('cursos');
            $descripcion=$this->input->post('descripcion');
            $fecha=$this->input->post('fecha');
            $calificacion=$this->input->post('calificacion');
            //Hacemos el insert en la base de datos
            $this->student->insertProyect($cedula, $cursos, $duracion, $descripcion, $calificacion, $tecnologias, $fecha);
            //Re direccionamos y refrescamos la pagina con los parametros necesarios
            redirect("student/detallesModificar/" . $id . "/" . $cedula, "refresh");
        }
    }

    public function comment($pId) {
        $user = $this->session->userdata('user');
        if (!$user) {
            $this->load->view('plantillas/header');
            $this->load->view('user/login');
        } else {
            $data = array(
                'detalles' => $this->student->detalles($pId),
            );
            $this->load->view('plantillas/header');
            $this->load->view('students/student_comment', $data);
        }
    }

    public function insertComment() {
        //Validamos si la sesión ya esta iniciada
        $user = $this->session->userdata('user');
        if (!$user) {
            $this->load->view('plantillas/header');
            $this->load->view('user/login');
        } else {
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

    public function insert() {
        $user = $this->session->userdata('user');
        if (!$user) {
            $this->load->view('plantillas/header');
            $this->load->view('user/login');
        } else {
            $cedula = $this->input->post('cedula');
            $nombre = $this->input->post('nombre');
            $nivelIngles = $this->input->post('ingles');
            $habilidades = $this->input->post('habilidades');
            $carrera = $this->input->post('carreras');
            $this->student->insert_student($nombre, $cedula, $carrera, $nivelIngles, $habilidades);


            //Datos del proyecto a registrar

            $duracion = $this->input->post('duracion');
            $cursos = $this->input->post('cursos');
            $descripcion = $this->input->post('descripcion');
            $calificacion = $this->input->post('calificacion');
            $list = $this->input->post('tecnologias');
            $tecnologias = implode(", ", $list);
            $fecha = $this->input->post('fecha');
            $this->student->insertarProyecto($cedula, $cursos, $duracion, $descripcion, $calificacion, $tecnologias, $fecha);

            //Datos del profesor

            $nombreProfesor = $this->input->post('nombreProfesor');
            $fechaProfesor = $this->input->post('fechaProfesor');
            $comentario = $this->input->post('comentarioProfesor');

            $this->student->insertarComentario($cedula, $nombreProfesor, $fechaProfesor, $comentario);

            redirect("student/obtenerStudents", "refresh");
        }
    }

}
