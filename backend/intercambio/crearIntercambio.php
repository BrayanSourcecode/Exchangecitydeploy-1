<?php 

include_once "/wamp64/www/Exchangecity/proyectoSena/funciones/conexionDB.php";
include_once "/wamp64/www/Exchangecity/proyectoSena/funciones/masFunciones.php";
$cod_usuario_implicado= isset($_POST["cod_usuario"]) ?$_POST["cod_usuario"] :false;
$cod_propietario= isset($_POST["cod_propietario"]) ?$_POST["cod_propietario"] :false;
$cod_publicacion= isset($_POST["cod_publicacion"]) ?$_POST["cod_publicacion"] :false;
$imagen1= isset($_FILES["imagen1"]["tmp_name"]) ? $_FILES["imagen1"]["tmp_name"]:false;
$imagen2 = isset($_FILES["imagen2"]["tmp_name"]) ? $_FILES["imagen2"]["tmp_name"]:false;
$imagen3 = isset($_FILES["imagen3"]["tmp_name"]) ? $_FILES["imagen3"]["tmp_name"]:false;
$imagen4 = isset($_FILES["imagen4"]["tmp_name"]) ? $_FILES["imagen4"]["tmp_name"]:false;
$imagen5 = isset($_FILES["imagen1Dirreccion"]["tmp_name"]) ? $_FILES["imagen1Dirreccion"]["tmp_name"]:false;
$imagen6 = isset($_FILES["imagen2Dirreccion"]["tmp_name"]) ? $_FILES["imagen2Dirreccion"]["tmp_name"]:false;
$error=array();


if($cod_publicacion){
    $sql2="SELECT * FROM  publicacion where pub_codigo='$cod_publicacion'";
    $verPublicacion=mysqli_query($db,$sql2);

    if($publicacionVer=mysqli_fetch_assoc($verPublicacion)){
        $dueñoPub=$publicacionVer["FK_dat_codigo_pd_usu"];
        $pubCod=$publicacionVer["pub_codigo"];
       
        if($dueñoPub==$_SESSION["login_correcto"]["usu_codigo"]){
            $existePub=true;
         }else{
             $error=+1;
             $_SESSION["publicacion_not_dueño"]=" no eres el dueño de la piblicaion";
             
         }
        
    } else{
        $error=+1;
        $_SESSION["publicacion_not_existe"]="la publicacion no existe ";
    }  
    
}


if($cod_usuario_implicado){
    $sql="SELECT * FROM datos_verificado WHERE FK_dat_codigo_du='$cod_usuario_implicado'";
    $existeUsuario=mysqli_query($db,$sql);
    $datos_usuario=mysqli_fetch_assoc($existeUsuario);
    if($datos_usuario){
       
    }else{
       
        $_SESSION["usuario_not_existe"]="el usuario no esta verificado ";
        $error+=1;
}
}


if($cod_propietario){
    $sql="SELECT * FROM datos_verificado WHERE FK_dat_codigo_du='$cod_propietario'";
    $existeUsuario=mysqli_query($db,$sql);
    $datos_usuario=mysqli_fetch_assoc($existeUsuario);
    if($datos_usuario){
        
    }else{
        
        $_SESSION["propietario_not_existe"]="el propietario no esta  verificado";
        $error+=1;
}
}


$error=array();
if($imagen1 && $imagen2 && $imagen3 && $imagen4 && $imagen5 && $imagen6 ){
     
    $tamaño_img1= $_FILES["imagen1"]["size"];
    $tamaño_img2= $_FILES["imagen2"]["size"];
    $tamaño_img3= $_FILES["imagen3"]["size"];
    $tamaño_img4= $_FILES["imagen4"]["size"];
    $tamaño_img5= $_FILES["imagen1Dirreccion"]["size"];
    $tamaño_img6= $_FILES["imagen2Dirreccion"]["size"];
    // se lee la imagen que inserto el usuario y se guarda en variable
    $leer_imagen1= fopen($imagen1,"r");
    $leer_imagen2= fopen($imagen2,"r");
    $leer_imagen3= fopen($imagen3,"r");
    $leer_imagen4= fopen($imagen4,"r");
    $leer_imagen5= fopen($imagen5,"r");
    $leer_imagen6= fopen($imagen6,"r");
    // se convierte la imagen en bites
    $conversion_img1=fread($leer_imagen1,$tamaño_img1);
    $conversion_img2=fread($leer_imagen2,$tamaño_img2);
    $conversion_img3=fread($leer_imagen3,$tamaño_img3);
    $conversion_img4=fread($leer_imagen4,$tamaño_img4);
    $conversion_img5=fread($leer_imagen5,$tamaño_img5);
    $conversion_img6=fread($leer_imagen6,$tamaño_img6);
    //se quitan las barras invertidas para que deje insertar la im
    $conversion_img1=addslashes($conversion_img1);
    $conversion_img2=addslashes($conversion_img2);
    $conversion_img3=addslashes($conversion_img3);
    $conversion_img4=addslashes($conversion_img4);
    $conversion_img5=addslashes($conversion_img5);
    $conversion_img6=addslashes($conversion_img6);
}else{
    $_SESSION["errorImagen"]="por favor lleno todos los campos de imagen";
    header("location:/exchangecity/proyectoSena/Includes/intercambio/crearIntercambio.php");
    $error+=1;       
}
   
if(count($error)==0 && $existePub==true){
    $sql1="INSERT INTO intercambio (int_codigo,int_img1,int_img2,int_img3,int_img4,int_conf_direccion_usu,int_conf_direccion_pro,FK_dat_codigo_id_usu,FK_dat_codigo_id_pro,FK_pub_codigo_ip )
    values(Null,'$conversion_img1','$conversion_img2','$conversion_img3','$conversion_img4','$conversion_img5','$conversion_img6','$cod_usuario_implicado','$cod_propietario','$pubCod')";
    $crear_intercambio=mysqli_query($db,$sql1);

    if($crear_intercambio){
        $_SESSION["intercambio_creado_mensaje"]="el intercambio se creo correctamente puede consultar el proceso en opciones";
        $_SESSION["intercambio_creado"]="intercambio Creado";
        header("location:/exchangecity/proyectoSena/Includes/intercambio/2Intercambio.php");
    }else{
        $_SESSION["intercambio_not_creado"]="el intercambio no se creo correctamente ";
        echo "no se creo el intercambio". mysqli_error($db);
    }
}else{
    header("location:/exchangecity/proyectoSena/Includes/intercambio/crearIntercambio.php");
}

?>