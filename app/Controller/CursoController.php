<?php

    class CursoController {

        public function index(){
            try {
                $storeCursos = Curso::getAll();

                $loader = new \Twig\Loader\FilesystemLoader('app/View');
                $twig = new \Twig\Environment($loader);
                
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