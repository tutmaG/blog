<?php

// // $url = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    define("url" , $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);

     if(strpos(url , "classes") == false && strpos(url , "includes") == false){
        include_once 'header.php'; 
     }
   
     spl_autoload_register('myAutoLoader');

        function myAutoLoader($className){
            if(strpos(url , "includes") !== false){
                $path  = "../classes/";
            }
            elseif(strpos(url , "classes") !== false){
                $path  = "";
            }
            else{
                $path  = "classes/";
            }
            
            $extension = ".class.php";
            $fullPath  = $path . $className . $extension ;
            // echo $fullPath;

            if(!file_exists($fullPath)){
                return false;
            }
            else{
                include_once $fullPath;
            }
        }
