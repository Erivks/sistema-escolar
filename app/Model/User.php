<?php

    class User 
    {
        public static function getUser($userDataset)
        {
            $conn = ConnectionToDB::getConnection();
            
            $queryRequest = "SELECT * FROM usuarios WHERE user = :user, password = :password";
            $queryRequest = $conn->prepare($queryRequest);
            $queryRequest->bindValue(':user', $userDataset['userInput'], PDO::PARAM_STR);
            $queryRequest->bindValue(':password', $userDataset['passwordInput'], PDO::PARAM_STR);
            
            $queryResponse = $queryRequest->execute();

            if($queryResponse->rowCount() == 1){
                return $queryResponse;
            } else {
                throw new Exception("Usuário e/ou senha incorretos.");
            }
        }    
    }
?>