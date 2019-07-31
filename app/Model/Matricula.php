<?php

    class Matricula {

        public static function getAll(){

            $conn = ConnectionToDB::getConnection();

            $queryRequest = "SELECT id_matricula, a.nome_aluno as 'nome_aluno', c.nome_curso as 'nome_curso' 
                            FROM Matriculas as m
                            INNER JOIN Alunos as a on a.id_aluno = m.id_aluno
                            INNER JOIN Cursos as c on c.id_curso = m.id_curso";
            $queryRequest = $conn->prepare($queryRequest);
            $queryRequest->execute();

            $queryResponse = array();

            while ($row = $queryRequest->fetchObject('Matricula')) {
                $queryResponse[] = $row;
            }

            if(!$queryResponse){
                throw new Exception("Não foi possivel encontrar nenhum registro de matriculas.");
            }

            return $queryResponse;
        }
        public static function deleteByID($matriculaID){
            
            $conn = ConnectionToDB::getConnection();

            $queryRequest = "DELETE FROM Matriculas WHERE id_matricula = :id";
            $queryRequest = $conn->prepare($queryRequest);
            $queryRequest->bindValue(':id', $matriculaID['id'], PDO::PARAM_INT);
            $queryResponse = $queryRequest->execute();

            if($queryResponse == false) {
                throw new Exception("Não foi possivel deletar a matriculas");
            }

            return $queryResponse;
        }
    }


?>