<?php
    require_once 'app/Core/Core.php';
    require_once 'app/lib/Database/Connection.php';
    require_once 'app/lib/Twig/Twig.php';
    require_once 'app/Controller/ErrorController.php';
    require_once 'app/Controller/HomeController.php';
    require_once 'app/Controller/CursoController.php';
    require_once 'app/Controller/AlunoController.php';
    require_once 'app/Controller/MatriculaController.php';
    require_once 'app/Model/Curso.php';
    require_once 'app/Model/Matricula.php';
    require_once 'app/Model/Aluno.php';
    require_once 'vendor/autoload.php';

    $template = file_get_contents('app/Template/estrutura.html');

    ob_start();
        $core = new Core();
        $core->start($_GET);
        $return = ob_get_contents();
    ob_end_clean();

    $readyTemplate = str_replace('{{área}}', $return, $template);

    echo $readyTemplate;
?>