<?php 
include_once "/app/funciones/conexionDB.php";

$usuario=$_REQUEST["usu_codigo"];
$sql2="DELETE FROM publicacion WHERE FK_dat_codigo_pd_usu ='$usuario'";

if(mysqli_query($db,$sql2)){ 
        
}else{
        echo "error".mysqli_error($db) ;
}

$sql="DELETE FROM datos_verificado WHERE FK_dat_codigo_du ='$usuario'";
if(mysqli_query($db,$sql)){
    header("location: /Includes/administrador/crudVerificado.php");
    $_SESSION["eliminar_ver"]="El verificado del usuario se elimino correctamente";
}else{
    echo "error".mysqli_error($db);
        
}

?>
