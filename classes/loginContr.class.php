<?php
    include_once '../includes/class-autoloader.inc.php';

    class loginContr extends login{
        private $usernameORemail; 
        private $passwrod; 

        public function __construct( $usernameORemail,$passwrod){
            $this->usernameORemail = $usernameORemail;
            $this->passwrod = $passwrod;

        }

        public function loginUser(){
            if($this->emptyInput() == false){
                header('Location: ../login.php?error=emptyinput');
                exit();
            }

            $this->getUser($this->usernameORemail ,  $this->passwrod);

        }

        private function emptyInput(){
            $result = null;
            if(empty($this->usernameORemail) || empty($this->passwrod) ){
                $result = false;
            }
            else{
                $result = true;
            }
            return $result;
        }
    }