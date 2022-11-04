<?php 
/* funcion para consultar ciudades */
function ConsultarCiudades($db){
    $sql="SELECT * FROM ciudad ";

    if($datosCiudad=mysqli_query($db,$sql)){
        
    }else{
        echo mysqli_error($db);
    }
    return $datosCiudad;
}

?>
<?php
function ConsultarCategoria($db){
    $sql="SELECT * FROM categoria ";

    if($datosCategoria=mysqli_query($db,$sql)){
        
    }else{
        echo mysqli_error($db);
    }
    return $datosCategoria;
}
?>

<?php
    function  ConsultarDatosVerificado($db){       
       $codigoUsu= $_SESSION["login_correcto"]["usu_codigo"];
       $sql="SELECT * FROM datos_verificado where FK_dat_codigo_du= '$codigoUsu'";
       if($consultaVer=mysqli_query($db,$sql)){
            return $consultaVer;
       }else{
        return false;
        }
    }
?>

<?php
function ConsultarEstado($db){
    $sql="SELECT * FROM estado ";

    if($datosEstado=mysqli_query($db,$sql)){
        
    }else{
        echo mysqli_error($db);
    }
    return $datosEstado;
}
?>

<?php
function ConsultarPublicaciones($db){
    $sql="SELECT * FROM publicacion  ORDER BY  pub_codigo  DESC LIMIT 10";

    if($datosPublicacion=mysqli_query($db,$sql)){
        
    }else{
        echo mysqli_error($db);
    }
    return $datosPublicacion;
}
?>

<?php
function ConsultarCategoriaPublicacion($db,$id_categoria){
    $sql="SELECT * FROM categoria  WHERE cat_codigo='$id_categoria'";

    if($datosCategoriaPublicacion=mysqli_query($db,$sql)){
        
    }else{
        echo mysqli_error($db);
    }
    return $datosCategoriaPublicacion;
}
?>

<?php
function ConsultarEstadoPublicacion($db,$id_estado){
    $sql="SELECT * FROM estado WHERE est_codigo='$id_estado'";

    if($datosEstadoPublicacion=mysqli_query($db,$sql)){
        
    }else{
        echo mysqli_error($db);
    }
    return $datosEstadoPublicacion;
}
?>
<?php
    function ConsultarPublicacionCat($db,$id_categoria){
        $sql="SELECT * FROM publicacion WHERE FK_cat_codigo_pc='$id_categoria'";

        if($publicacionCategoria=mysqli_query($db,$sql)){

        }else{
            echo mysqli_error($db);
        }
        return $publicacionCategoria;
    }
?>

<?php

function ConsultarDescripcionPublicacion($db,$id_publicacion){
    $sql="SELECT * FROM publicacion WHERE pub_codigo='$id_publicacion'";

    if($datosDescripcionPublicacion=mysqli_query($db,$sql)){
        
    }else{
        echo mysqli_error($db);
    }
    return $datosDescripcionPublicacion;
}
?>

<?php 
    function ConsultarVerificados($db,$id_usuario){

        $sql="SELECT * FROM datos_verificado WHERE FK_dat_codigo_du='$id_usuario'";

        if($datosVerificado=mysqli_query($db,$sql)){

        }else{
            echo mysqli_error($db);
        }
        return $datosVerificado;
    }

?>


<?php

function ConsultarPublicacionesUsuario($db,$id_usuario){

    $sql="SELECT * FROM publicacion WHERE FK_dat_codigo_pd_usu='$id_usuario'";

    if($datosPublicacionesUsuario=mysqli_query($db,$sql)){
        
    }else{
        echo mysqli_error($db);
    }
    return $datosPublicacionesUsuario;
}



function ConsultarExisteUsuario($db,$cod_usuario){
    $sql="SELECT * FROM datos_verificado where FK_dat_codigo_du= '$cod_usuario' ";
    if($existeUsuario=mysqli_query($db,$sql)){
        return $existeUsuario;
    }else{
        echo mysqli_error($db);
    }
    
}

function ConsultarExisteProveedor($db,$cod_verificado){
    $sql="SELECT * FROM datos_verificado where FK_dat_codigo_du='$cod_verificado'";
    if($existeProveedor=mysqli_query($db,$sql)){
        return $existeProveedor;
    }else{
        echo mysqli_error($db);
    }
   
}

function IntercambioUsuarioProveedor($db,$cod_usuario){
    $sql="SELECT * FROM intercambio where (FK_dat_codigo_id_usu='$cod_usuario') or (FK_dat_codigo_id_pro='$cod_usuario')";
    $existeUsuario=mysqli_query($db,$sql);
    $existeInter=mysqli_fetch_assoc($existeUsuario);

    if(isset($existeInter)){
        return $existeInter;
    }else{
       
    }
}

function CodigoUsuarioProveedor($db,$cod_usuario){
    $sql="SELECT * FROM intercambio where (FK_dat_codigo_id_usu='$cod_usuario') or (FK_dat_codigo_id_pro='$cod_usuario')";
    $existeUsuario=mysqli_query($db,$sql);
    $existeInter=mysqli_fetch_assoc($existeUsuario);

    if(isset($existeInter)){
        return $existeInter;
    }else{
       
    }
}



?>












 
