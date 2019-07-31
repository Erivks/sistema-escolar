<?php

    class MatriculaController {
        public function index(){
            try {
                
                $storeMatriculas = Matricula::getAll();
                
                $twig = Twig::loadTwig();
                $template = $twig->load('matriculas.html');

                $matriculas = array();
                $matriculas['matriculas'] = $storeMatriculas;

                echo $template->render(array('matriculas' => $matriculas['matriculas']));
                
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }
        public function deleteData($matriculaID){
            try {
                Matricula::deleteByID($matriculaID['id']);
                $this->index();
            } catch (Exception $error) {
                echo $error->getMessage();
            }
        }
    }
?>