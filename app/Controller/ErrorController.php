<?php

namespace App\Controller;

class ErrorController 
{
    public function index() 
    {
        echo 'Erro, essa página existe';
    }
    public static function errorLogin()
    {
        $twig = Twig::loadTwig();
        $template = $twig->load('errorLogin.html');
        echo $template->render(array());
    }
}

?>