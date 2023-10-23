<?php
   
    include_once '../includes/class-autoloader.inc.php';
    use Core\dbh;

    class signup extends dbh{

        protected function setUser($username , $email , $password){
            $stmt = $this->connect()->prepare('INSERT INTO users (username , email , passwrod)  VALUES (?,?,?);');

            $hashPassword = password_hash($password , PASSWORD_DEFAULT);
            
            if(!$stmt->execute(array($username , $email , $hashPassword))){
                $stmt = null;
                header('Location: ../index.php?error=stmtfailed');
                exit();
            }
            $stmt= null;
        }

        protected function checkUser($username , $email){
            $stmt = $this->connect()->prepare('SELECT username FROM users WHERE username = ? OR email = ?;');

            if(!$stmt->execute(array($username , $email))){
                $stmt = null;
                header('Location: ../index.php?error=stmtfailed');
                exit();
            }
            $resultCheck = null;

            if($stmt->rowCount() > 0){
                $resultCheck = false;
            }
            else{
                $resultCheck = true;
            }

            return $resultCheck;
        }

        protected  function getUserID($username){
            $stmt = $this->connect()->prepare('SELECT id FROM users WHERE username = ?;');

            if(!$stmt->execute(array($username))){
                $stmt = null;
                header("location: profile.php?error=stmtfailed");
                exit();
            }

            if($stmt->rowCount() == 0){
                $stmt = null;
                header("location: profile.php?error=profilenotfound");
                exit();
            }
            
            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $user;
        }
    }