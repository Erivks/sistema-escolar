<?php

    class MatriculaController {
        public function index(){
            try {
                
                $storeMatriculas = Matricula::getAll();
                $twig = Twig::loadTwig();
                $template = $twig->load('matriculas.html');
                echo $template->render($storeMatriculas);
                
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }
    }
?>