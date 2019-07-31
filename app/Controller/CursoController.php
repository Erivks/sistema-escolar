<?php

    class CursoController {

        public function index(){
            try {
                $storeCursos = Curso::getAll();

                $twig = Twig::loadTwig();
                $template = $twig->load('curso.html');
                
                $params = array();
                $params['cursos'] = $storeCursos;

                $content = $template->render($params);    
                echo $content;
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }
    }

?>