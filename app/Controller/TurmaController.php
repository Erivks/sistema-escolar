<?php

class TurmaController 
{
    public function index() 
    {
        try {
            $storeTurma = Turma::getAll();

            $turmas = array(
                'turmas' => $storeTurma
            );
            
            $twig = Twig::loadTwig();
            $template = $twig->load('turmas.html');

            if(isset($_SESSION['userId']))
            {
                echo $template->render(array(
                    'classes' => $turmas['turmas']
                ));
            } else 
            {
                ErrorController::errorLogin();
            }
            
        } catch (Exception $error) {

            $twig = Twig::loadTwig();
            $template = $twig->load('inserirTurma.html');

            $message = $error->getMessage();

            if(isset($_SESSION['userId']))
            {
                echo $template->render(array(
                    'message' => $message
                ));
            } else 
            {
                ErrorController::errorLogin();
            }
        }
    }
    public function deleteData($classID)
    {
        try {
            Turma::deleteClass($classID);
            header('loaction:?page=turma');
        } catch (Exception $error) {
            echo $error->getMessage();
        }
    }
    public function alterData()
    {
        try {
            $className = $_POST['nameInput'];
            $classTime = $_POST['shiftInput'];
            $classID = $_POST['idInput'];

            $classDataset = array(
                'id' => $classID,
                'name' => $className,
                'time' => $classTime
            );
            
            Turma::alterClass($classDataset);
            header('location:?page=turma');
        } catch (Exception $error) {
            echo $error->getMessage();
        }
    }
    public function insertData()
    {
        try {
            $className = $_POST['nameInput'];
            $classTime = $_POST['shiftInput'];

            $classDataset = array(
                'name' => $className,
                'time' => $classTime
            );
            
            Turma::insertClass($classDataset);
            header('location:?page=turma');
        } catch (Exception $error) {
            echo $error->getMessage();
        }
    }
}
