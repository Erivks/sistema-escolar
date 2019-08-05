<?php

    class MatriculaController {
        public function index(){
            try {
                
                $storeMatriculas = Matricula::getAll();
                $storeAlunos = Aluno::getAll();
                $storeCursos = Curso::getAll();

                $twig = Twig::loadTwig();
                $template = $twig->load('matriculas.html');

                $matriculas = array();
                $cursos = array();
                $alunos = array();

                $matriculas['matriculas'] = $storeMatriculas;
                $cursos['cursos'] = $storeCursos;
                $alunos['alunos'] = $storeAlunos;

                echo $template->render(array(
                    'matriculas' => $matriculas['matriculas'],
                    'cursos' => $cursos['cursos'],
                    'alunos' => $alunos['alunos']
                ));
                
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }
        public function deleteData($matriculaID){
            try {
                Matricula::deleteByID($matriculaID);
                $this->index();
            } catch (Exception $error) {
                echo $error->getMessage();
            }
        }
        public function alterData(){
            try {
                $registrationID = $_POST['idInput'];
                $studentID = $_POST['studentNameInput'];
                $courseID = $_POST['courseNameInput'];

                $registrationDataset = array(
                    'registrationID' => $registrationID,
                    'studentID' => $studentID,
                    'courseID' => $courseID
                );

                $queryStudent = Matricula::alterData($registrationDataset);
                header('location:?page=matricula');
            } catch (Exception $error) {
                echo $error->getMessage();
            }
        }
    }
?>