<?php

    class MatriculaController {
        public function getAll(){
            try {
                $storeMatriculas = Matricula::getAll();

                var_dump($storeMatriculas);
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }
    }
?>