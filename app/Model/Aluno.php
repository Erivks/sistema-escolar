<?php

    class Aluno {
        public static function getAll(){
            //Fazendo conexão com o banco
            $conn = ConnectionToDB::getConnection();
            
            //Fazendo consulta
            $queryRequest = 'SELECT * FROM Alunos';
            $queryRequest = $conn->prepare($queryRequest); //Preparando consulta
            $queryRequest->execute(); //Realizando consulta

            $queryResponse = array();

            foreach ($queryRequest->fetchObject('Aluno') as $row) {
                $queryResponse = $row;
            }

            if(!$queryResponse){
                throw new Exception("Não foi encontrado nenhum registro de aluno.");
            }

            return $queryResponse;
        }
    }

?>