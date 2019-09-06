<?php

    require_once __DIR__.'/vendor/autoload.php';

    use App\Core\Core;
    use App\lib\Twig;
    
    ob_start();
        $core = new Core();
        $core->start($_GET);
        $return = ob_get_contents();
    ob_end_clean();

    if (isset($_SESSION)) {
        $twig = Twig::loadTemplate();
        $template = $twig->load('estrutura.html');
        echo $template->render(array(
            'session' => $_SESSION,
            'área' => $return
        ));
    } else {
        echo $template->render(array(
            'área' => $return
        ));
    }
?>