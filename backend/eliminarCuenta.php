<?php 
include_once "/wamp64/www/Exchangecity/proyectoSena/funciones/conexionDB.php";

$usuario=$_REQUEST["usu_codigo"] ;
$sql2="DELETE FROM publicacion WHERE FK_dat_codigo_pd_usu ='$usuario'";
if(mysqli_query($db,$sql2)){
    echo"se liminopublicaion";
}else{
        echo "error".mysqli_error($db) ;
}

$sql="DELETE FROM datos_verificado WHERE FK_dat_codigo_du ='$usuario'";
if(mysqli_query($db,$sql)){
    echo"se limino de datos";
}else{
        echo "error".mysqli_error($db) ;
}
$sql1="DELETE FROM usuario WHERE usu_codigo='$usuario'";

if(mysqli_query($db,$sql1)){
    $_SESSION["login_correcto"]=session_destroy();
    header("location: /exchangecity/proyectosena/index.php");
}else{
        echo "error".mysqli_error($db) ;
}


?>