<?php
    class Database{
        private static ?PDO $conn = null;
        public static function connect() : PDO{
            if(self::$conn === NULL){
                try{
                    self::$conn = new PDO("mysql:host=localhost;dbname=Metis", "root","");
                    self::$conn-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                }catch (PDOException $e){
                    echo "eroor connexion" . $e->getMessage();
                }
            }
            return self::$conn;
        }   
    }
?>