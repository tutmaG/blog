<?php

    include_once(__DIR__ . '/../includes/class-autoloader.inc.php');
    use Core\dbh;
    class profileInfo  extends dbh{

        protected  function getProfileInfo($userID){
            $stmt = $this->connect()->prepare('SELECT * FROM profile WHERE users_id = ?;');

            if(!$stmt->execute(array($userID))){
                $stmt = null;
                header("location: profile.php?error=stmtfailed");
                exit();
            }

            if($stmt->rowCount() == 0){
                $stmt = null;
                header("location: profile.php?error=profilenotfound");
                exit();
            }
            
            $profileData = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $profileData;
        }

        protected  function setNewProfileInfo($profileAbout, $profileTitle, $profileText , $userID){
            $stmt = $this->connect()->prepare('UPDATE profile SET profiles_about = ?, profiles_introtitle = ?, profiles_introtext = ? WHERE users_id = ?;');

            if(!$stmt->execute(array($profileAbout, $profileTitle, $profileText , $userID))){
                $stmt = null;
                header("location: profile.php?error=stmtfailed");
                exit();
            }

            $stmt = null;
        }

        protected  function setProfileInfo($profileAbout, $profileTitle, $profileText , $userID){
            $stmt = $this->connect()->prepare('INSERT INTO profile (profiles_about ,profiles_introtitle ,profiles_introtext ,users_id) VALUES (?, ?, ?, ?);');

            if(!$stmt->execute(array($profileAbout, $profileTitle, $profileText , $userID))){
                $stmt = null;
                header("location: profile.php?error=stmtfailed");
                exit();
            }

            $stmt = null;
        }

    }