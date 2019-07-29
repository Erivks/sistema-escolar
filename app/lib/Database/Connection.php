<?php

    abstract class ConnectionToDB {
        private static $conn; //Atributo estático

        public function getConnection(){

            if (self::$conn == null){
                self::$conn = new PDO('mysql: host=localhost; dbname="id10191281_curso";', 'id10191281_admin', 'pisolar.js');
            }
            return self::$conn;
        }
    }

?>