<?php

    include_once(__DIR__ . '/../includes/class-autoloader.inc.php');
    class profileInfoContr  extends profileInfo{

        private $userID;
        private $username;
        
        public function __construct($userID, $username){
                $this->userID   = $userID;
                $this->username = $username;
        }

        public function defaultProfileInfo(){
            $profileAbout = "You can customize your profile!";
            $profileTitle = "Hi! I am " . $this->username;
            $profileText =  "Thank you for joining our site";

            $this->setProfileInfo($profileAbout, $profileTitle, $profileText , $this->userID);
        }

        public function updateProfileInfo($about , $titile , $text){
            // Error hendlers
            if($this->emptyInputCheck($about,$about, $text)){
                header("location: ../profilesettings.php?error=emptyinputs");
                exit();
            }
            
            // Update profile info
            $this->setNewProfileInfo($about, $titile, $text , $this->userID);
        }

        private function emptyInputCheck($about, $titile, $text){
            $result = null;
            if(empty($about) ||empty($titile) || empty($text)){
                $result = true ; 
            }else{
                $result  = false;
            }
            return $result;
        }
    }