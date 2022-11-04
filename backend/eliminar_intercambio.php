<?php 
include_once "/wamp64/www/Exchangecity/proyectoSena/funciones/conexionDB.php";

$int_codigo=$_REQUEST["int_codigo"] ;
echo $int_codigo;
$sql2="DELETE FROM intercambio WHERE int_codigo ='$int_codigo'";
if(mysqli_query($db,$sql2)){
    header("location: ./index.php");
    $_SESSION["intercambio_eliminado"]="El intercambio se elimino correctamente";
}else{
        echo "error".mysqli_error($db) ;
}

// $sql="DELETE FROM datos_verificado WHERE FK_dat_codigo_du ='$usuario'";
// if(mysqli_query($db,$sql)){
//     echo"se limino de datos";
// }else{
//         echo "error".mysqli_error($db) ;
// }
// $sql1="DELETE FROM usuario WHERE usu_codigo='$usuario'";

// if(mysqli_query($db,$sql1)){
//     $_SESSION["login_correcto"]=session_destroy();
//     header("location: /exchangecity/proyectosena/index.php");
// }else{
//         echo "error".mysqli_error($db) ;
// }


?>