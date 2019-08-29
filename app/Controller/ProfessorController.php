<?php
    class ProfessorController {
        public function index() {
            try {
                $storeTeacher = Professor::getAll();
                
                $twig = Twig::loadTwig();
                $template = $twig->load('professores.html');
                
                $teachers = array(
                    'teachers' => $storeTeacher
                );
                
                if(isset($_SESSION['userId']))
                {
                
                    echo $template->render(array(
                        'teachers' => $teachers['teachers']
                    ));
                
                } else 
                {
                
                    ErrorController::errorLogin();
                
                }

            } catch (Exception $error) {
                $twig = Twig::loadTwig();
                $template = $twig->load('professores.html');

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
        public function deleteData($teacherID){
            try {
                Professor::deleteTeacher($teacherID);
                header('location:?page=professor');
            } catch (Exception $error) {
                echo $error->getMessage();
            }
        }
        public function alterData(){
            try {
                $teacherID = $_POST['idInput'];
                $teacherName = $_POST['nameInput'];
                
                $teacherDataset = array(
                    'id' => $teacherID,
                    'name' => $teacherName
                );

                $queryResponse = Professor::alterTeacher($teacherDataset);
                header('location:?page=professor');
            } catch (Exception $error) {
                echo $error->getMessage();
            }
        }
        public function insertData(){
            try {
                $teacherName = $_POST['nameInput'];

                $teacherDataset = array(
                    'name' => $teacherName
                );

                Professor::insertTeacher($teacherDataset);
                header('location:?page=professor');
            } catch (Exception $error) {
                echo $error->getMessage();
            }
        }
    }

?>