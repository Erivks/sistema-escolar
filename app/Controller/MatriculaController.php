<?php

    class MatriculaController {
        public function index(){
            try {
                $storeMatriculas = Matricula::getAll();

                var_dump($storeMatriculas);
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }
    }
?>