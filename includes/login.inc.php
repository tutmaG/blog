<?php

    // if(isset($_POST['submit-login'])){
    if($_SERVER['REQUEST_METHOD'] == "POST"){
    
        $usernameORemail = htmlspecialchars($_POST["usernameORemail"] , ENT_QUOTES , 'UTF-8');
        $password        =  htmlspecialchars($_POST["password"] , ENT_QUOTES , 'UTF-8');

        include "class-autoloader.inc.php";
        $login = new  loginContr($usernameORemail,$password);
        $login->loginUser();

        header('Location: ../index.php?success=login');
        
    }
    else{

        header('location: ../index.php?');
    }
