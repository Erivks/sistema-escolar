<?php

    class CursoController {

        public function index(){
            try {
                $storeCursos = Curso::getAll();
                var_dump($storeCursos);
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }
    }

?>