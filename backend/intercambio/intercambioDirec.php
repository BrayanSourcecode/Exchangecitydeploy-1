<?php
    include_once "/app/funciones/conexionDB.php";
    include_once "/app/funciones/masFunciones.php";


$inter_exist =IntercambioUsuarioProveedor($db,$_SESSION["login_correcto"]["usu_codigo"]);
$cod_int=$_REQUEST["int_codigo"];
if(isset($inter_exist)){
$sql="UPDATE intercambio  SET
int_exitosa='1' WHERE int_codigo='$cod_int'";

if(mysqli_query($db,$sql)){
    echo "se inserto";
    header("location: /index.php");
    $_SESSION["intercambio_finalizado"]="su intercambio a finalizado con exito";

}else{
    echo "no se incerto" . mysqli_error($db);

}

}else{
    echo "error". mysqli_error($db);
}




