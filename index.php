<?php
    require_once 'app/Core/Core.php';
    require_once 'app/lib/Database/Connection.php';
    require_once 'app/lib/Twig/Twig.php';
    require_once 'app/Controller/ErrorController.php';
    require_once 'app/Controller/HomeController.php';
    require_once 'app/Controller/CursoController.php';
    require_once 'app/Controller/AlunoController.php';
    require_once 'app/Controller/MatriculaController.php';
    require_once 'app/Controller/ProfessorController.php';
    require_once 'app/Controller/TurmaController.php';
    require_once 'app/Controller/UserController.php';
    require_once 'app/Model/Curso.php';
    require_once 'app/Model/Matricula.php';
    require_once 'app/Model/Aluno.php';
    require_once 'app/Model/Professor.php';
    require_once 'app/Model/Turma.php';
    require_once 'app/Model/User.php';
    require_once 'vendor/autoload.php';

    ob_start();
        $core = new Core();
        $core->start($_GET);
        $return = ob_get_contents();
    ob_end_clean();

    if(isset($_SESSION))
    {
        $twig = Twig::loadTemplate();
        $template = $twig->load('estrutura.html');
        echo $template->render(array(
            'session' => $_SESSION,
            'área' => $return
        ));
    } else 
    {
        echo $template->render(array(
            'área' => $return
        ));
    }
?>