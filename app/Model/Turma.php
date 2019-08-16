<?php
    class Turma {
        public static function getAll(){
            $conn = ConnectionToDB::getConnection();

            $queryRequest = 'SELECT * FROM Turmas';
            $queryRequest = $conn->prepare($queryRequest);
            $queryRequest->execute();

            $queryResponse = array();

            while($row = $queryRequest->fetchObject('Turma')) {
                $queryResponse[] = $row;
            }
            if(!$queryResponse){
                throw new Exception("Não possível encontrar nenhum registro de turmas.");
            }

            return $queryResponse;
        }
        public static function deleteClass($classID){
            $conn = ConnectionToDB::getConnection();

            $queryRequest = 'DELETE FROM Turmas WHERE id_turma = :id';
            $queryRequest = $conn->prepare($queryRequest);
            $queryRequest->bindValue(':id', $classID, PDO::PARAM_INT);
            $queryResponse = $queryRequest->execute();

            if(!$queryRequest){
                throw new Exception("Não foi possivel deletar a turma");
            }

            return $queryResponse;
        }
        public static function alterClass($classDataset){
            $conn = ConnectionToDB::getConnection();

            $queryRequest = 'UPDATE Turmas SET nome_turma = :name, horario_turma = :time WHERE id_turma = :id';
            $queryRequest = $conn->prepare($queryRequest);
            $queryRequest->bindValue(':name', $classDataset['name'], PDO::PARAM_STR);
            $queryRequest->bindValue(':time', $classDataset['time'], PDO::PARAM_STR);
            $queryRequest->bindValue(':id', $classDataset['id'], PDO::PARAM_INT);
            $queryResponse = $queryRequest->execute();

            if(!$queryResponse){
                throw new Exception("Não foi possível alterar a turma.");
            }

            return $queryResponse;
        }
        public static function insertClass($classDataset){
            $conn = ConnectionToDB::getConnection();

            $queryRequest = 'INSERT INTO Turmas (nome_turma, horario_turma)
                            VALUES
                            (:name, :time)';
            $queryRequest = $conn->prepare($queryRequest);
            $queryRequest->bindValue(':name', $classDataset['name'], PDO::PARAM_STR);
            $queryRequest->bindValue(':time', $classDataset['time'], PDO::PARAM_STR);
            $queryResponse = $queryRequest->execute();

            if(!$queryResponse){
                throw new Exception("Não foi possível inserir a turma.");
            }

            return $queryResponse;
        }
    }
?>