<?php
    class UserController 
    {
        public function index()
        {
            try 
            {
                $user = $_POST['userInput'];
                $password = $_POST['passwordInput'];
                $userDataset = array(
                    'user' => $user,
                    'password' => $password
                );
                User::getUser($userDataset);
                $_SESSION['login'] = true;
                header('?page=curso');
            } catch (Exception $error) 
            {   
                $error->getMessage();
            }
        }
    }

?>