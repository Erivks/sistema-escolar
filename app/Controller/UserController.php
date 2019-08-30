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
                $_SESSION = array(
                    'login' => true,
                    'userId' => $user->id,
                    'userName' => $user->user,
                    'userPassword' => $user->pass
                );
                header('location:?page=home');
            } catch (Exception $error) 
            {
                $message = $error->getMessage();
                $twig = Twig::loadTwig();
                $template = $twig->load('home.html');
                echo $template->render(array(
                    'error' => $message
                ));
            }
        }
        public function logout()
        {
            if(isset($_SESSION['userId']))
            {
                session_destroy();
                header('location:?page=home');
            } else 
            {
                echo 'Não logado';
            }
        }
        public static function verifyLogin()
        {
            if (isset($_SESSION['userId'])) {
                return $_SESSION;
            } else {
                ErrorController::errorLogin();
            }
        }
    }

?>