<?php
    include_once '../includes/class-autoloader.inc.php';

    class signupContr extends signup{
        private $username; 
        private $email; 
        private $passwrod; 
        private $repPassword;
        
        public function __construct( $username,$email,$passwrod,$repeatPassword){
            $this->username = $username;
            $this->email    = $email;
            $this->passwrod = $passwrod;
            $this->repPassword = $repeatPassword;
        }

        public function signupUser(){
            if($this->emptyInput() == false){
                header('Location: ../index.php?error=emptyinput');
                exit();
            }
            if($this->invalidUsername() == false){
                header('Location: ../index.php?error=username');
                exit();
            }
            if($this->invalidEmail() == false){
                header('Location: ../index.php?error=email');
                exit();
            }
            if($this->passwordMatch() == false){
                header('Location: ../index.php?error=passwordmatch');
                exit();
            }
            if($this->usernameTakenCheck() == false){
                header('Location: ../index.php?error=useroremailtaken');
                exit();
            }

            $this->setUser($this->username , $this->email , $this->passwrod);

        }

        private function emptyInput(){
            $result = null;
            if(empty($this->username) || empty($this->email) || empty($this->passwrod) || empty($this->repPassword)){
                $result = false;
            }
            else{
                $result = true;
            }
            return $result;
        }

        private function invalidUsername(){
            $result = null;
            if(!preg_match("/^[a-zA-Z0-9]*$/", $this->username)){
                $result = false;
            }
            else{
                $result = true;
            }
            return $result;
        }

        private function invalidEmail(){
            $result = null;
            if(!filter_var($this->email , FILTER_VALIDATE_EMAIL)){
                $result = false;
            }
            else{
                $result = true;
            }
            return $result;
        }

        private function passwordMatch(){
            $result = null;
            if($this->passwrod !== $this->repPassword){
                $result = false;
            }
            else{
                $result = true;
            }
            return $result;
        }

        private function usernameTakenCheck(){
            $result = null;
            if(!$this->checkUser($this->username , $this->email)){
                $result = false;
            }
            else{
                $result = true;
            }
            return $result;
        }

        public function fetchUserID($username){
            $userID = $this->getUserID($username);
            return $userID[0]['id'];
        }

    }