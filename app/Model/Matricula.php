<?php

    class Matricula {

        public static function getAll(){

            $conn = ConnectionToDB::getConnection();

            $queryRequest = "SELECT id_aluno_curso, a.nome as 'nome_aluno', c.nome as 'nome_curso' 
                            FROM Alunos_Cursos as ac
                            INNER JOIN Alunos as a on a.id_aluno = ac.id_aluno
                            INNER JOIN Cursos as c on c.id_curso = ac.id_curso";
            $queryRequest = $conn->prepare($queryRequest);
            $queryRequest-execute();

            $queryResponse = array();

            foreach ($queryRequest->fetchObject('Matricula') as $row) {
                $queryResponse = $row;
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