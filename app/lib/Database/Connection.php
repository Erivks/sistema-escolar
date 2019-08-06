<?php

    abstract class ConnectionToDB {
        private static $conn; //Atributo estático

        public static function getConnection(){

            if (self::$conn == null){
                try {
                    self::$conn = new PDO(
                        'mysql: host=localhost; dbname=crud; charset=utf8', 
                        'root', 
                        ''
                    );
                } catch (Exception $error) {
                    throw new Exception("Não foi possível se conectar ao banco");
                }
            }
            return self::$conn;
        }
    }

?>