<?php

    abstract class Twig {

        public static function loadTwig()
        {
            $loader = new \Twig\Loader\FilesystemLoader('app/View');
            $twig = new \Twig\Environment($loader);
            return $twig;
        }
        public static function loadTemplate()
        {
            $loader = new \Twig\Loader\FilesystemLoader('app/Template');
            $twig = new \Twig\Environment($loader);
            return $twig;
        }
        
    }

?>