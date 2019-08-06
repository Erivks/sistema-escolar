<?php

    class Matricula {

        public static function getAll(){

            $conn = ConnectionToDB::getConnection();

            $queryRequest = "SELECT id_matricula, a.id_aluno, c.id_curso, a.nome_aluno as 'nome_aluno', c.nome_curso as 'nome_curso' 
                            FROM Matriculas as m
                            INNER JOIN Alunos as a on a.id_aluno = m.id_aluno
                            INNER JOIN Cursos as c on c.id_curso = m.id_curso
                            ORDER BY id_matricula";
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
            $queryRequest->bindValue(':id', $matriculaID, PDO::PARAM_INT);
            $queryResponse = $queryRequest->execute();

            if($queryResponse == false) {
                throw new Exception("Não foi possivel deletar a matriculas");
            }

            return $queryResponse;
        }
        public static function alterData($registrationDataset){

            $conn = ConnectionToDB::getConnection();

            $registrationID = $registrationDataset['registrationID'];
            $studentID = $registrationDataset['studentID'];
            $courseID = $registrationDataset['courseID'];

            $queryRequest = 'UPDATE Matriculas SET id_aluno = :studentID, id_curso = :courseID
                            WHERE id_matricula = :registrationID';
            $queryRequest = $conn->prepare($queryRequest);
            $queryRequest->bindValue(':studentID', $studentID, PDO::PARAM_INT);
            $queryRequest->bindValue(':courseID', $courseID, PDO::PARAM_INT);
            $queryRequest->bindValue(':registrationID', $registrationID, PDO::PARAM_INT);
            $queryResponse = $queryRequest->execute();

            if(!$queryResponse){
                throw new Exception("Não foi possível alterar a matrícula");
            }

            return $queryResponse;
        }
        public static function insertData($registrationDataset){

            $conn = ConnectionToDB::getConnection();

            $studentID = $registrationDataset['studentID'];
            $courseID = $registrationDataset['courseID'];

            $queryRequest = 'INSERT INTO Matriculas (id_curso, id_aluno)
                            VALUES
                            (:courseID, :studentID)';
            $queryRequest = $conn->prepare($queryRequest);
            $queryRequest->bindValue(':courseID', $courseID, PDO::PARAM_INT);
            $queryRequest->bindValue(':studentID', $studentID, PDO::PARAM_INT);
            $queryResponse = $queryRequest->execute();

            if(!$queryResponse){
                throw new Exception("Não foi possível inserir a matrícula");
            }

            return $queryResponse;
        }
    }


?>