<?php
    
    class HomeController {
        public function index(){
            try {
                $twig = Twig::loadTwig();
                $template = $twig->load('home.html');
                echo $template->render();
            } catch (Exception $e) {
                echo $e;
            }
        }
    }

?>