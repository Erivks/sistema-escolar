<?php

    abstract class ConnectionToDB {
        private static $conn; //Atributo estático

        public class getConnection(){

            if (self::$conn == null){
                self::$conn = new PDO('mysql: host=localhost; dbname='';', 'admin', 'pass');
            }
            return self::$conn;
        }
    }

?>