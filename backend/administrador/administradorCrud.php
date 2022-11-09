<?php
     include_once("/app/funciones/conexionDB.php");

     $usuario=$_REQUEST["usu_codigo"] ;

     $sql1="DELETE FROM usuario WHERE usu_codigo='$usuario'";

if(mysqli_query($db,$sql1)){
   
    header("location: /index.php");
    $_SESSION["eliminar_adm"]="Se elimino el administrador de la base de datos";
     $_SESSION["usuario_administrador"]=session_destroy();
    
}else{
        echo "error".mysqli_error($db);
}

?>
