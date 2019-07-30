<?php

    abstract class ConnectionToDB {
        private static $conn; //Atributo estático

        public static function getConnection(){

            if (self::$conn == null){
                try {
                    self::$conn = new PDO('mysql: host=localhost; dbname="id10191281_curso";', 'id10191281_admin', 'pisolar.js');
                } catch (Exception $error) {
                    throw new Exception("Não foi possível se conectar ao banco");
                }
            }
            return self::$conn;
        }
    }

?>