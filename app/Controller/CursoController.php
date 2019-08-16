<?php

    class CursoController {

        public function index(){
            try {
                $storeCursos = Curso::getAll();

                $twig = Twig::loadTwig();
                $template = $twig->load('cursos.html');
                
                $cursos = array();
                $cursos['cursos'] = $storeCursos;

                $content = $template->render(array('cursos' => $cursos['cursos']));    
                echo $content;
            } catch (Exception $error) {
                $twig = Twig::loadTwig();
                $template = $twig->load('inserirCurso.html');

                $message = $error->getMessage();
                $template = $template->render(array('message' => $message));
                echo $template;
            }
        }

        public function deleteData($cursoID){
            try {
                Curso::deleteByID($cursoID);
                header('location:?page=curso');
            } catch (Exception $error) {
                echo $error->getMessage();
            }
        }

        public function alterData(){
            try {
                $courseID = $_POST['idInput'];
                $courseName = $_POST['nameInput'];
                $courseWorkload = $_POST['workloadInput'];

                $courseDataset = array(
                    'id' => $courseID,
                    'name' => $courseName,
                    'workload' => $courseWorkload
                );
                $queryResponse = Curso::alterData($courseDataset);
                header('location:?page=curso');
            } catch (Exception $error) {
                echo $error->getMessage();
            }
        }

        public function insertData(){
            try {
                $courseName = $_POST['nameInput'];
                $courseWorkload = $_POST['workloadInput'];

                $courseDataset = array(
                    'name' => $courseName,
                    'workload' => $courseWorkload
                );

                $queryResponse = Curso::insertData($courseDataset);
                header('location:?page=curso');
            } catch (Exception $error) {
                echo $error->getMessage();
            }
        }
    }

?>