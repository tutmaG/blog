<?php

    // if(isset($_POST['submit-signup'])){
    if($_SERVER['REQUEST_METHOD'] == "POST"){

        $username       = htmlspecialchars($_POST["username"] , ENT_QUOTES , 'UTF-8');
        $email          = htmlspecialchars($_POST["email"] , ENT_QUOTES , 'UTF-8');
        $password       = htmlspecialchars($_POST["password"] , ENT_QUOTES , 'UTF-8');
        $repeatPassword =  htmlspecialchars($_POST["repeat-password"] , ENT_QUOTES , 'UTF-8');

        include "class-autoloader.inc.php";
        $signup = new  signupContr($username,$email,$password,$repeatPassword);
        $signup->signupUser();

        $userID = $signup->fetchUserID($username);

        $profileInfo = new  profileInfoContr($userID,$username);
        $profileInfo->defaultProfileInfo();
        
        header('Location: ../index.php?success=registersuccessful');
    }
    else{
        header('location: ../index.php?');
    }
