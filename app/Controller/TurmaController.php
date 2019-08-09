<?php
    class TurmaController {
        public function index() {
            try {
                $storeTurma = Turma::getAll();

                $turmas = array(
                    'turmas' => $storeTurma
                );
                
                $twig = Twig::loadTwig();
                $template = $twig->load('turmas.html');

                echo $template->render(array(
                    'turmas' => $turmas['turmas']
                ));
            } catch (Exception $error) {

                $twig = Twig::loadTwig();
                $template = $twig->load('inserirTurma.html');

                $message = $error->getMessage();
                echo $template->render(array(
                    'message' => $message
                ));
            }
        }
        public function deleteData($classID){
            try {
                Turma::deleteClass($classID);
                header('loaction:?page=turma');
            } catch (Exception $error) {
                echo $error->getMessage();
            }
        }
        public function alterData(){
            try {
                $className = $_POST['nameInput'];
                $classTime = $_POST['timeInput'];

                $classDataset = array(
                    'name' => $className,
                    'time' => $classTime
                );
                
                Turma::alterClass($classDataset);
                header('location:?page=turma');
            } catch (Exception $error) {
                echo $error->getMessage();
            }
        }
        public function insertData(){
            try {
                $className = $_POST['nameInput'];
                $classTime = $_POST['timeInput'];

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
?>