<?php

    namespace Core;
    use PDO;

use PDOException;

    class dbh{

        protected function connect(){
            try{
                $username = "root";
                $password = "";
                $dbh = new PDO('mysql:host=localhost;dbname=loginsystem', $username , $password);
                return $dbh;
            }
            catch(PDOException $e){
                print "Error!: " .$e->getMessage() . "<br>";
                die();
            }
        }
    }

