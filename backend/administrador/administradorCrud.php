<?php
     include_once("/wamp64/www/Exchangecity/proyectoSena/funciones/conexionDB.php");

     $usuario=$_REQUEST["usu_codigo"] ;

     $sql1="DELETE FROM usuario WHERE usu_codigo='$usuario'";

if(mysqli_query($db,$sql1)){
   
    header("location: /exchangecity/proyectosena/includes/administrador/crudAdministrador.php");
    $_SESSION["eliminar_adm"]="Se elimino el administrador de la base de datos";
    
}else{
        echo "error".mysqli_error($db);
}

?>