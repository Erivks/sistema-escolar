<?php

class Curso 
{

    public static function getAll()
    {
        //Fazendo a conexão
        $conn = ConnectionToDB::getConnection();

        $queryRequest = "SELECT * FROM cursos";
        $queryRequest = $conn->prepare($queryRequest);
        $queryRequest->execute();
        $queryResponse = array();

        while ($row = $queryRequest->fetchObject('Curso')) {
            $queryResponse[] = $row;
        }

        if (!$queryResponse) {
            throw new Exception('Não foi encontrado nenhum registro de curso.');
        }

        return $queryResponse;
    }
    public static function deleteByID($cursoID)
    {

        $conn = ConnectionToDB::getConnection();

        $queryRequest = "DELETE FROM Cursos WHERE id_curso = :id";
        $queryRequest = $conn->prepare($queryRequest);
        $queryRequest->bindValue(':id', $cursoID, PDO::PARAM_INT);
        $queryResponse = $queryRequest->execute();
        
        if ($queryResponse == false) {
            throw new Exception("Não foi possível deletar o o curso");
        }

        return $queryResponse;
        
    }

    public static function alterData($courseDataset)
    {

        $conn = ConnectionToDB::getConnection();

        $courseID = $courseDataset['id'];
        $courseName = $courseDataset['name'];
        $courseWorkload = $courseDataset['workload'];

        $queryRequest = "UPDATE Cursos SET nome_curso = :name, carga_horaria = :workload
                        WHERE id_curso = :id";
        $queryRequest = $conn->prepare($queryRequest);
        $queryRequest->bindValue(':name', $courseName, PDO::PARAM_STR);
        $queryRequest->bindValue(':workload', $courseWorkload, PDO::PARAM_INT);
        $queryRequest->bindValue(':id', $courseID, PDO::PARAM_INT);

        $queryResponse = $queryRequest->execute();

        if (!$queryResponse) {
            throw new Exception("Não foi possível alterar o curso");
        }

        return $queryResponse;
    }

    public static function insertData($courseDataset)
    {

        $conn = ConnectionToDB::getConnection();

        $courseName = $courseDataset['name'];
        $courseWorkload = $courseDataset['workload'];
        
        $queryRequest = 'INSERT INTO Cursos (nome_curso, carga_horaria) 
                        VALUES
                        (:name, :workload)';
        $queryRequest = $conn->prepare($queryRequest);
        $queryRequest->bindValue(':name', $courseName, PDO::PARAM_STR);
        $queryRequest->bindValue(':workload', $courseWorkload, PDO::PARAM_INT);
        $queryResponse = $queryRequest->execute();

        if (!$queryResponse) {
            throw new Exception("Não foi possível inserir o curso");
        }

        return $queryResponse;
    }
}
