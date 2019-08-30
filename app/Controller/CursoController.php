<?php

    class CursoController 
    {
        public function index()
        {
            try {
                $storeCursos = Curso::getAll();

                $twig = Twig::loadTwig();
                $template = $twig->load('cursos.html');
                
                $cursos = array(
                    'cursos' => $storeCursos
                );

                if (UserController::verifyLogin()) {
                    echo $template->render(array(
                        'cursos' => $cursos['cursos'],
                    ));
                }
            } catch (Exception $error) {
                if (UserController::verifyLogin()) {
                    $twig = Twig::loadTwig();
                    $template = $twig->load('cursos.html');
                    $message = $error->getMessage();
                    echo $template->render(array(
                        'message' => $message
                    ));
                }
            }
        }

        public function deleteData($cursoID)
        {
            try {
                if (UserController::verifyLogin()) {
                    Curso::deleteByID($cursoID);
                    header('location:?page=curso');
                }
            } catch (Exception $error) {
                echo $error->getMessage();
            }
        }

        public function alterData()
        {
            try {
                if (UserController::verifyLogin()) {
                    $courseID = $_POST['idInput'];
                    $courseName = $_POST['nameInput'];
                    $courseWorkload = $_POST['workloadInput'];
                    $courseDataset = array(
                        'id' => $courseID,
                        'name' => $courseName,
                        'workload' => $courseWorkload
                    );
                    Curso::alterData($courseDataset);
                    header('location:?page=curso');
                }
            } catch (Exception $error) {
                echo $error->getMessage();
            }
        }

        public function insertData()
        {
            try {
                if (UserController::verifyLogin()) {
                    $courseName = $_POST['nameInput'];
                    $courseWorkload = $_POST['workloadInput'];
                    $courseDataset = array(
                        'name' => $courseName,
                        'workload' => $courseWorkload
                    );
                    $queryResponse = Curso::insertData($courseDataset);
                    header('location:?page=curso');
                }
            } catch (Exception $error) {
                echo $error->getMessage();
            }
        }
    }
