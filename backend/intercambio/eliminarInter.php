<?php 
include_once "/app/funciones/conexionDB.php";

 echo $inter_codigo=$_REQUEST["int_codigo"] ;
$sql2="DELETE FROM intercambio WHERE int_codigo='$inter_codigo'";
if(mysqli_query($db,$sql2)){
    
    $_SESSION["intercambio_eliminada"]="la publicacion se elimino correctamente";
  
}else{
        echo "error".mysqli_error($db) ;
}




?>
