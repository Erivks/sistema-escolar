<?php
    class UserController 
    {
        public function login()
        {
            try {
                $user = $_POST['userInput'];
                $password = $_POST['passwordInput'];
                $userDataset = array(
                    'user' => $user,
                    'password' => $password
                );
                $user = User::getUser($userDataset);
                $_SESSION['login'] = true;
                $_SESSION['userId'] = $user->id;
                header('location:?page=home');
            } catch (Exception $error) {
                echo $error->getMessage();
            }
        }
    }

?>