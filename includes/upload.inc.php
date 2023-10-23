<?php
    include_once 'class-autoloader.inc.php';
    use Core\dbh;
    if(isset($_POST['submit-upload'])){

        
    }else{
        header('location: ../index.php?dontAllowed');
        exit();
    }