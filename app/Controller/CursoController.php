<?php

    class CursoController {

        public function index(){
            try {
                $storeCursos = Curso::getAll();

                $twig = Twig::loadTwig();
                $template = $twig->load('curso.html');
                
                $cursos = array();
                $cursos['cursos'] = $storeCursos;

                $content = $template->render($cursos['cursos']);    
                echo $content;
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }

        public function deleteData($cursoID){
            try {
                Curso::deleteByID($cursoID['id']);
                $this->index();
            } catch (Exception $error) {
                echo $error->getMessage();
            }
        }
    }

?>