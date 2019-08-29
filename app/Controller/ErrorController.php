<?php

    class ErrorController {
        public function index() {
            echo 'Erro';
        }
        public static function errorLogin()
        {
            $twig = Twig::loadTwig();
            $template = $twig->load('errorLogin.html');
            echo $template->render(array());
        }
    }

?>