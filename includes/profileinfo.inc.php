<?php
    include_once(__DIR__ . '/../includes/class-autoloader.inc.php');
    session_start();

    if($_SERVER['REQUEST_METHOD'] == "POST"){

        $id      = $_SESSION['id'];
        $username =$_SESSION['username'];
        $about = htmlspecialchars($_POST["about"] , ENT_QUOTES , 'UTF-8');
        $title = htmlspecialchars($_POST["title"] , ENT_QUOTES , 'UTF-8');
        $text  = htmlspecialchars($_POST["text"] , ENT_QUOTES , 'UTF-8');

        $profileInfo = new profileInfoContr($id , $username);
        $profileInfo->updateProfileInfo($about , $title , $text);
        header('location: ../profile.php?change=success');
        
    }else{
        header('location: ../index.php?');
    }