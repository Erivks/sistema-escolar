<?php

    class Curso {

        public static function getAll(){
            //Fazendo a conexão
            $conn = ConnectionToDB::getConnection();

            $queryRequest = 'SELECT * FROM Cursos';
            $queryRequest = $conn->prepare($queryRequest);
            $queryRequest->execute();

            $queryResponse = array();

            foreach ($queryRequest->fetchObject('Curso') as $row) {
                $queryResponse = $row;
            }

            if(!$queryResponse){
                throw new Exception('Não foi encontrado nenhum registro de curso.');
            }

            return $queryResponse;
        }
        public static function deleteByID($cursoID){

            $conn = ConnectionToDB::getConnection();

            $queryRequest = "DELETE FROM Cursos WHERE id_curso = :id";
            $queryRequest = $conn->prepare($queryRequest);
            $queryRequest->bindValue(':id', $cursoID['id'], PDO::PARAM_INT);
            $queryRequest->execute();
           
            

        }
    }


?>