<?php 

include_once "/app/funciones/conexionDB.php";

$usuario=$_REQUEST["usu_codigo"] ;
$sql2="DELETE FROM publicacion WHERE FK_dat_codigo_pd_usu ='$usuario'";
if(mysqli_query($db,$sql2)){
    
}else{
        echo "error".mysqli_error($db) ;
}
$sql="DELETE FROM intercambio WHERE FK_dat_codigo_id_usu ='$usuario'";
if(mysqli_query($db,$sql)){
   
}else{
        echo "error".mysqli_error($db) ;
}
$sql="DELETE FROM datos_verificado WHERE FK_dat_codigo_du ='$usuario'";
if(mysqli_query($db,$sql)){
    
}else{
        echo "error".mysqli_error($db) ;
}
$sql1="DELETE FROM usuario WHERE usu_codigo='$usuario'";

if(mysqli_query($db,$sql1)){
   
    header("location: /Includes/administrador/crudUsuarios.php");
    $_SESSION["usuario_crud"]="Se elimino todos los datos referentes a el usuario";
    
}else{
        echo "error".mysqli_error($db) ;
}


?>
