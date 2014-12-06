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
            $tecnologias="";
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
