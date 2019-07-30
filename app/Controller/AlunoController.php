<?php

    class AlunoController {
        public function index(){

            try {
                $storeAlunos = Aluno::getAll();
                var_dump($storeAlunos);
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }
    }

?>