<?php
    class ProfessorController {
        public function index() {
            try {
                $storeTeacher = Professor::getAll();
                
                $twig = Twig::loadTwig();
                $template = $twig->load('professores.html');
                
                $teachers = array();
                $teachers['teachers'] = $storeTeacher;

                $template = $template->render(array('teachers' => $teachers['teachers']));
                echo $template;
            } catch (Exception $error) {
                $twig = Twig::loadTwig();
                $template = $twig->load('inserirProfessor.html');

                $message = $error->getMessage();
                $template = $template->render(array('message' => $message));
                echo $template;
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