<?php

    include_once(__DIR__ . '/../includes/class-autoloader.inc.php');
    class profileInfoViwe  extends profileInfo{

        public function fetachAbout($userID){
            $profileInfo = $this->getProfileInfo($userID);
            echo $profileInfo[0]['profiles_about'];
        }

        public function fetachTitle($userID){
            $profileInfo = $this->getProfileInfo($userID);
            echo $profileInfo[0]['profiles_introtitle'];
        }

        public function fetachText($userID){
            $profileInfo = $this->getProfileInfo($userID);
            echo $profileInfo[0]['profiles_introtext'];
        }
    }
  