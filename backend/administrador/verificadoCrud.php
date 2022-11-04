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
    echo"se elimino de datos";
    header("location: /exchangecity/proyectosena/includes/administrador/crudVerificado.php");
    $_SESSION["eliminar_ver"]="El verificado del usuario se elimino correctamente";
}else{
        echo "error".mysqli_error($db) ;
        
}



?>