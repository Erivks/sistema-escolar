<?php

    class AlunoController {
        public function index(){
            try {

                $storeAlunos = Aluno::getAll();
                $twig = Twig::loadTwig();
                $template = $twig->load('cursos.html');
                echo $template->render($storeAlunos);
            
            } catch (Exception $error) {
                echo $error->getMessage();
            }
        }
        public function deleteData($alunoID){
            try {
                Aluno::deleteByID($alunoID);
                self::index();
            } catch(Exception $error){
                echo $error->getMessage();
            }
        }
    }

?>