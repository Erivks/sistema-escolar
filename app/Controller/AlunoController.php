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
                if(isset($_SESSION['userId']))
                {   
                    echo $template->render(array(
                        'alunos' => $alunos['alunos'],
                        'session' => $_SESSION
                    ));
                } else 
                {
                    ErrorController::errorLogin();
                }
            
            } catch (Exception $error) {
                $twig = Twig::loadTwig();
                $template = $twig->load('alunos.html');

                $message = $error->getMessage();
                if(isset($_SESSION['userId']))
                {
                    echo $template->render(array(
                        'message' => $message,
                    ));
                } else 
                {
                    ErrorController::errorLogin();
                }
            }
        }
        public function deleteData($alunoID){
            try {
                Aluno::deleteByID($alunoID);
                header('location:?page=aluno');
            } catch(Exception $error){
                echo $error->getMessage();
            }
        }
        public function alterData(){
            try {
                
                $studentID = $_POST['idInput'];
                $studentName = $_POST['nameInput'];
                $studentBirthday = $_POST['birthdayInput'];

                $studentDataset = array(
                    'id' => $studentID, 
                    'name' => $studentName, 
                    'birthday' => $studentBirthday
                );

                $queryResponse = Aluno::alterData($studentDataset);
                header('location:?page=aluno');
            } catch(Exception $error){
                echo $error->getMessage();
            }
        }
        public function insertData(){
            try {
                
                $studentName = $_POST['nameInput'];
                $studentBirthday = $_POST['birthdayInput'];
                $studentBirthday = DateTime::createFromFormat('d/m/Y', $studentBirthday);
                $studentBirthday = $studentBirthday->format('Y-m-d');
                $studentDataset = array(
                    'name' => $studentName,
                    'birthday' => $studentBirthday
                );

                $queryResponse = Aluno::insertData($studentDataset);
                header('location:?page=aluno');
            } catch (Exception $error) {
                echo $error->getMessage();
            }
        }
    }

?>