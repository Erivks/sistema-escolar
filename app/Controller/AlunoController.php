<?php

    class AlunoController {
        public function index(){
            try {
                //Retornando dados de todos os alunos
                $storeAlunos = Aluno::getAll();

                //Carregando a view para renderizar
                $twig = Twig::loadTwig();
                $template = $twig->load('alunos.html');

                //Criando um array para melhor identificação dos campos
                $alunos = array();
                $alunos['alunos'] = $storeAlunos;

                //Renderizando template
                echo $template->render(array('alunos' => $alunos['alunos']));
            
            } catch (Exception $error) {
                echo $error->getMessage();
            }
        }
        public function deleteData($alunoID){
            try {
                Aluno::deleteByID($alunoID);
                $this->index();
            } catch(Exception $error){
                echo $error->getMessage();
            }
        }
        public function alterData(){
            try {
                $studentID = $_POST['idInput'];
                $studentName = $_POST['nameInput'];
                $studentBirthday = $_POST['birthdayInput'];
                
                if(isset($_POST['idInput'])){
                    $studentDataset = array('id' => $studentID, 
                                        'name' => $studentName,
                                        'birthday' => $studentBirthday);
                
                    Aluno::alterStudent($studentDataset);
                    $this->index();
                }
            } catch(Exception $error){
                echo $error->getMessage();
            }
        }
    }

?>