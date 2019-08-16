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
                
            } catch (Exception $error) {
                $twig = Twig::loadTwig();
                $template = $twig->load('inserirMatricula.html');
                
                try {
                    $storeAlunos = Aluno::getAll();
                } catch (Exception $error) {
                    $messageAluno = $error->getMessage();
                }
                try {
                    $storeCursos = Curso::getAll();   
                } catch (Exception $error) {
                    $messageCurso = $error->getMessage();
                }

                if(!isset($storeAlunos)){
                    $twig = Twig::loadTwig();
                    $template = $twig->load('inserirAluno.html');
                    $template = $template->render(array(
                        'message' => $messageAluno
                    ));
                    echo $template;
                }elseif(!isset($storeCursos)){
                    $twig = Twig::loadTwig();
                    $template = $twig->load('inserirCurso.html');
                    $template = $template->render(array(
                        'message' => $messageCurso
                    ));
                    echo $template;
                }else{
                    $alunos['alunos'] = $storeAlunos;
                    $cursos['cursos'] = $storeCursos;

                    $message = $error->getMessage();
                    $template = $template->render(array(
                        'message' => $message,
                        'students' => $alunos['alunos'],
                        'courses' => $cursos['cursos']
                    ));
                    echo $template;
                }
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
        public function insertData(){
            try {
                $studentID = $_POST['studentNameInput'];
                $courseID = $_POST['courseNameInput'];

                $registrationDataset = array(
                    'studentID' => $studentID,
                    'courseID' => $courseID
                );

                $queryStudent = Matricula::insertData($registrationDataset);
                header('location:?page=matricula');
            } catch (Exception $error) {
                echo $error->getMessage();
            }
        }
    }
?>