<?php
    
    class HomeController {
        public function index(){
            try {
                $loader = new \Twig\Loader\FilesystemLoader('app/View');
                $twig = new \Twig\Environment($loader);
                $template= $twig->load('home.html');
                echo $template->render();
            } catch (Exception $e) {
                echo $e;
            }
        }
    }

?>