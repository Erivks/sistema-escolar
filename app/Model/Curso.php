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
    }


?>