<?php
   
    include_once '../includes/class-autoloader.inc.php';
    use Core\dbh;

    class login extends dbh{

        protected function getUser($usernameORemail , $password){
            $stmt = $this->connect()->prepare('SELECT passwrod FROM users WHERE username = ? OR email = ?;');

            if(!$stmt->execute(array($usernameORemail ,$usernameORemail))){
                $stmt = null;
                header('Location: ../index.php?error=stmtfailed');
                exit();
            }

            if($stmt->rowCount() == 0){
                $stmt = null;
                header("Location: ../index.php?error=usernotfound");
                exit();
            }

            $passwordhasd = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $chekpassword = password_verify($password,$passwordhasd[0]['passwrod']);
           
            if($chekpassword == false){
                $stmt = null;
                header("Location: ../index.php?error=wrongpassword");
                exit();
            }
            elseif($chekpassword == true){
                $stmt = $this->connect()->prepare('SELECT * FROM users WHERE username = ? OR email = ? ;');

                if(!$stmt->execute(array($usernameORemail , $usernameORemail))){
                    $stmt = null;
                    header('Location: ../index.php?error=stmtfailed');
                    exit();
                }

                if($stmt->rowCount() == 0){
                    $stmt = null;
                    header("Location: ../index.php?error=usernotfound2");
                    exit();
                }

                $user = $stmt->fetchAll(PDO::FETCH_ASSOC);

                session_start();
                $_SESSION['id']       = $user[0]['id'];
                $_SESSION['username'] = $user[0]['username'];
                $_SESSION['email']    = $user[0]['email'];

                 $stmt= null;
            }

            $stmt= null;
        }

    }