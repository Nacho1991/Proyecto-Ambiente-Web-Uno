<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Student extends CI_Controller {

    public function __construct() {

        parent::__construct();
        $this->load->model('Student_model', 'student');
    }

    public function index() {
        $students = $this->student->get_all();
        $data = array(
            'estudiantes' => $students
        );
        $this->load->view('student/students_view', $data);
    }

    public function obtenerStudents() {
        $students = $this->student->get_all();
        $data = array(
            'estudiantes' => $students
        );
        $this->load->view('plantillas/header');
        $this->load->view('students/students_view', $data);
    }
    public function asociarProyecto($pId){
        
    }

    public function detallesModificar($pId) {
        $data = array(
            'detalles' => $this->student->detalles($pId),
            'skills' => $this->student->obtenerSkills(),
            'carreras' => $this->student->obtenerCarreras()
        );
        $this->load->view('plantillas/header');
        $this->load->view('/students/details_student_update', $data);
    }

    public function detallesInsertar() {
        $habilidades = array(
            'skills' => $this->student->obtenerSkills(),
            'carreras' => $this->student->obtenerCarreras()
        );
        $this->load->view('/plantillas/header');
        $this->load->view('students/insert_student', $habilidades);
    }

    public function detallesEliminar($pId) {
        $estudiante = $this->student->detalles($pId);
        if (!$estudiante) {
            $datos = array(
                'estudiante' => $estudiante
            );
            $this->load->view('/plantillas/header');
            $this->load->view('students/details_student_delete', $datos);
        } else {
            redirect("student/obtenerStudents", "refresh");
        }
    }

    public function detalles($pId) {
        $estudiante = $this->student->detalles($pId);
        if (!$estudiante) {
            $datos = array(
                'estudiante' => $estudiante
            );
            $this->load->view('/plantillas/header');
            $this->load->view('students/details_student_view', $datos);
        } else {
            redirect("student/obtenerStudents", "refresh");
        }
    }

    public function actualizar() {
        $id = $this->input->post('id');
        $cedula = $this->input->post('cedula');
        $nombre = $this->input->post('nombre');
        $nivelIngles = $this->input->post('ingles');
        $habilidades = $this->input->post('habilidades');
        $carrera = $this->input->post('carreras');
        $this->student->update($id, $cedula, $nombre, $carrera, $nivelIngles, $habilidades);
        redirect("student/obtenerStudents", "refresh");
    }

    public function delete() {
        $cedula = $this->input->post('cedula');
        $user = $this->student->delete($cedula);
        if (!$user) {
            echo 'error';
        }
    }

    public function insert() {
        $cedula = $this->input->post('cedula');
        $nombre = $this->input->post('nombre');
        $nivelIngles = $this->input->post('ingles');
        $habilidades = $this->input->post('habilidades');
        $carrera = $this->input->post('carreras');
        $this->student->insert_student($nombre, $cedula, $carrera, $nivelIngles, $habilidades);
        redirect("student/obtenerStudents", "refresh");
    }

}
