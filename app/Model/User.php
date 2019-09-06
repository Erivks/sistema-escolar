<?php

class User 
{
    public static function getUser($userDataset)
    {
        $conn = ConnectionToDB::getConnection();
        $queryRequest = 'SELECT * FROM usuarios WHERE user = :user AND pass = :pass';
        $queryRequest = $conn->prepare($queryRequest);
        $queryRequest->bindValue(':user', $userDataset['user'], PDO::PARAM_STR);
        $queryRequest->bindValue(':pass', $userDataset['password'], PDO::PARAM_STR);
        $queryRequest->execute();
        $queryResponse = $queryRequest->fetchObject('User');
        
        if (!$queryResponse) {
            throw new Exception("Usuário e/ou senha incorretos.");
        } else {
            return $queryResponse;
        }
    }
}
