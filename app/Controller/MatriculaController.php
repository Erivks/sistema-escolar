<?php

class MatriculaController 
{
    public function index()
    {
        try {
            if (UserController::verifyLogin()) {

                $storeMatriculas = Matricula::getAll();
                $storeAlunos = Aluno::getAll();
                $storeCursos = Curso::getAll();   
                
                $twig = Twig::loadTwig();
                $template = $twig->load('matriculas.html');
                
                $matriculas = array(
                    'matriculas' => $storeMatriculas
                );
                
                $cursos = array(
                    'cursos' => $storeCursos
                );
                
                $alunos = array(
                    'alunos' => $storeAlunos
                );
                
                echo $template->render(array(
                    'matriculas' => $matriculas['matriculas'],
                    'cursos' => $cursos['cursos'],
                    'alunos' => $alunos['alunos']
                ));
            }      
        } catch (Exception $error) {
            if (UserController::verifyLogin()) {
                
                $twig = Twig::loadTwig();
                $template = $twig->load('matriculas.html');
                
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

                if (!isset($storeAlunos)) {
                
                    $twig = Twig::loadTwig();
                    $template = $twig->load('matriculas.html');
                
                    $template = $template->render(array(
                        'messageAluno' => $messageAluno,
                        'erro' => true
                    ));
                    echo $template;
                
                } elseif (!isset($storeCursos)) {
                
                    $twig = Twig::loadTwig();
                    $template = $twig->load('matriculas.html');
                    $template = $template->render(array(
                        'messageCurso' => $messageCurso,
                        'erro' => true
                    ));
                    echo $template;
                
                } else {
                    
                    $alunos['alunos'] = $storeAlunos;
                    $cursos['cursos'] = $storeCursos;

                    $message = $error->getMessage();
                    $template = $template->render(array(
                        'message' => $message,
                        'students' => $alunos['alunos'],
                        'courses' => $cursos['cursos'],
                        'erro' => true
                    ));
                    echo $template;
                }
            }
        }
    }
    public function deleteData($matriculaID)
    {
        try {
            if (UserController::verifyLogin()) {
                Matricula::deleteByID($matriculaID);
                $this->index();
            }
        } catch (Exception $error) {
            echo $error->getMessage();
        }
    }
    public function alterData()
    {
        try {
            if (UserController::verifyLogin()) {
                $registrationID = $_POST['idInput'];
                $studentID = $_POST['studentNameInput'];
                $courseID = $_POST['courseNameInput'];

                $registrationDataset = array(
                    'registrationID' => $registrationID,
                    'studentID' => $studentID,
                    'courseID' => $courseID
                );

                Matricula::alterData($registrationDataset);
                header('location:?page=matricula');
            }
        } catch (Exception $error) {
            echo $error->getMessage();
        }
    }
    public function insertData()
    {
        try {
            if (UserController::verifyLogin()) {
                $studentID = $_POST['studentNameInput'];
                $courseID = $_POST['courseNameInput'];

                $registrationDataset = array(
                    'studentID' => $studentID,
                    'courseID' => $courseID
                );

                Matricula::insertData($registrationDataset);
                header('location:?page=matricula');
            }
        } catch (Exception $error) {
            echo $error->getMessage();
        }
    }
}
