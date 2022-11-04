<?php 
session_start();
    if(isset($_SESSION["login_correcto"])){
    $_SESSION["login_correcto"]=session_destroy();
    }
    header("location: ../index.php");
?>