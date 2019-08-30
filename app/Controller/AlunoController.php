<?php

    class AlunoController {
        public function index()
        {
            try {
                //Retornando dados de todos os alunos
                $storeAlunos = Aluno::getAll();

                //Carregando a view para renderizar
                $twig = Twig::loadTwig();
                $template = $twig->load('alunos.html');

                //Criando um array para melhor identificação dos campos
                $alunos = array(
                    'alunos' => $storeAlunos
                );

                //Renderizando template
                if (UserController::verifyLogin()) {   
                    echo $template->render(array(
                        'alunos' => $alunos['alunos'],
                    ));
                }
            } catch (Exception $error) {
                if (UserController::verifyLogin()) {
                    $twig = Twig::loadTwig();
                    $template = $twig->load('alunos.html');
                    $message = $error->getMessage();
                    echo $template->render(array(
                        'message' => $message,
                    ));
                }
            }
        }
        public function deleteData($alunoID)
        {
            try {
                if (UserController::verifyLogin()) {
                    Aluno::deleteByID($alunoID);
                    header('location:?page=aluno');
                }
            } catch(Exception $error){
                echo $error->getMessage();
            }
        }
        public function alterData()
        {
            try {
                if (UserController::verifyLogin()) {
                    $studentID = $_POST['idInput'];
                    $studentName = $_POST['nameInput'];
                    $studentBirthday = $_POST['birthdayInput'];
                    $studentDataset = array(
                        'id' => $studentID, 
                        'name' => $studentName, 
                        'birthday' => $studentBirthday
                    );
                    Aluno::alterData($studentDataset);
                    header('location:?page=aluno');
                }
            } catch(Exception $error){
                echo $error->getMessage();
            }
        }
        public function insertData()
        {
            try {                
                if (UserController::verifyLogin()) {
                    $studentName = $_POST['nameInput'];
                    $studentBirthday = $_POST['birthdayInput'];
                    $studentBirthday = DateTime::createFromFormat('d/m/Y', $studentBirthday);
                    $studentBirthday = $studentBirthday->format('Y-m-d');
                    $studentDataset = array(
                        'name' => $studentName,
                        'birthday' => $studentBirthday
                    );
                    Aluno::insertData($studentDataset);
                    header('location:?page=aluno');
                }
            } catch (Exception $error) {
                echo $error->getMessage();
            }
        }
    }
