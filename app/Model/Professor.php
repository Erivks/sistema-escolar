<?php
    class Professor {
        public static function getAll() {
            
            $conn = connectionToDB::getConnection();

            $queryRequest = 'SELECT * FROM Professores';
            $queryRequest = $conn->prepare($queryRequest);
            $queryRequest->execute();
            
            $queryResponse = array();
            
            while ($row = $queryRequest->fetchObject('Professor')) {
                $queryResponse[] = $row;
            }
            
            if(!$queryResponse){
                throw new Exception("Não foi encontrado nenhum registro de professor");
            }

            return $queryResponse;
        }
        public static function deleteTeacher($teacherID){

            $conn = ConnectionToDB::getConnection();

            $queryRequest = 'DELETE FROM Professores WHERE id_professor = :id';
            $queryRequest = $conn->prepare($queryRequest);
            $queryRequest->bindValue(':id', $teacherID, PDO::PARAM_INT);
            $queryResponse = $queryRequest->execute();

            if(!$queryResponse){
                throw new Exception("Não foi possível deletar o professor");
            }

            return $queryResponse;
        }
        public static function alterTeacher($teacherDataset){

            $conn = ConnectionToDB::getConnection();

            $teacherID = $teacherDataset['id'];
            $teacherName = $teacherDataset['name'];

            $queryRequest = 'UPDATE Professores SET nome_professor = :name 
                            WHERE id_professor = :id';
            $queryRequest = $conn->prepare($queryRequest);
            $queryRequest->bindValue(':name', $teacherID, PDO::PARAM_STR);
            $queryRequest->bindValue(':id', $teacherName, PDO::PARA_INT);
            $queryResponse = $queryRequest->execute();

            if(!$queryResponse){
                throw new Exception("Não foi possivel alterar o professor");
            }

            return $queryResponse;
        }
        public static function insertTeacher($teacherDataset){

            $conn = ConnectionToDB::getConnection();
        
            $teacherName = $teacherDataset['name'];

            $queryRequest = 'INSERT INTO Professores (nome_professor)
                            VALUES
                            (:name)';
            $queryRequest = $conn->prepare($queryRequest);
            $queryRequest->bindValue(':name', $teacherName, PDO::PARAM_STR);
            $queryResponse = $queryRequest->execute();

            if(!$queryResponse){
                throw new Exception("Não foi possível inserir o professor");
            }

            return $queryResponse;
        }
    }

?>