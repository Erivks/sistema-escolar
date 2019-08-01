<?php

    class Aluno {
        public static function getAll(){
            //Fazendo conexão com o banco
            $conn = ConnectionToDB::getConnection();
            
            //Fazendo consulta
            $queryRequest = 'SELECT * FROM alunos';
            $queryRequest = $conn->prepare($queryRequest); //Preparando consulta
            $queryRequest->execute(); //Realizando consulta

            $queryResponse = array();

            while ($row = $queryRequest->fetchObject('Aluno')) {
                $queryResponse[] = $row;
            }

            if(!$queryResponse){
                throw new Exception("Não foi encontrado nenhum registro de aluno.");
            }

            return $queryResponse;
        }

        public static function getByID($alunoID){

            $conn = ConnectionToDB::getConnection();

            $queryRequest = "SELECT * FROM Alunos WHERE id_aluno = :id";
            $queryRequest = $conn->prepare($queryRequest);
            $queryRequest->bindValue(':id', $alunoID['id'], PDO::PARAM_INT);
            $queryRequest->execute();

            $queryResponse = $queryRequest->fetchObject('Aluno');

            if(!$queryResponse){
                throw new Exception("Não foi possível encontrar nenhum registro de aluno no banco");
            }

            return $queryResponse;
        }

        public static function deleteByID($alunoID){

            $conn = ConnectionToDB::getConnection();

            $queryRequest = "DELETE FROM Alunos WHERE id_aluno = :id";
            $queryRequest = $conn->prepare($queryRequest);
            $queryRequest->bindValue(':id', $alunoID, PDO::PARAM_INT);
            $queryResponse = $queryRequest->execute();

            if($queryResponse == false){
                throw new Exception("Não foi possível deletar o aluno");
            }

            return $queryResponse;
        }
    }

?>