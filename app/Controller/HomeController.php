<?php
    
class HomeController 
{
    public function index()
    {
        try {
            $twig = Twig::loadTwig();
            $template = $twig->load('home.html');
            if (isset($_SESSION['userId'])) {
                echo $template->render(array(
                    'session' => $_SESSION
                ));
            } else {
                echo $template->render();
            }
        } catch (Exception $error) {
            echo $error->getMessage();
        }
    }
}
