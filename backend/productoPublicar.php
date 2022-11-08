<?php

include_once("/app/funciones/conexionDB.php");
include_once("/app/funciones/masFunciones.php");
$id=$_SESSION["login_correcto"]["usu_codigo"];
$tituloPub= isset ($_POST["tituloPublicacion"]) ? $_POST["tituloPublicacion"]:false;
$descripcionPub= isset ($_POST["descripcion"]) ? $_POST["descripcion"]:false;
$interesesPub= isset ($_POST["intereses"]) ? $_POST["intereses"]:false;
$categoriaIdPub= isset ($_POST["categoriaId"]) ? $_POST["categoriaId"]:false;
$estadoPub= isset ($_POST["estado"]) ? $_POST["estado"]:false;
$fotoPrincipal= isset($_FILES["fotoPrincipal"]["tmp_name"]) ? $_FILES["fotoPrincipal"]["tmp_name"]:false;
$imagen1= isset($_FILES["imagen1"]["tmp_name"]) ? $_FILES["imagen1"]["tmp_name"]:false;
$imagen2 = isset($_FILES["imagen2"]["tmp_name"]) ? $_FILES["imagen2"]["tmp_name"]:false;
$imagen3 = isset($_FILES["imagen3"]["tmp_name"]) ? $_FILES["imagen3"]["tmp_name"]:false;
$imagen4 = isset($_FILES["imagen4"]["tmp_name"]) ? $_FILES["imagen4"]["tmp_name"]:false;


 
$consultaFun=ConsultarDatosVerificado($db);
$error=0;
if($verificado=mysqli_fetch_assoc($consultaFun)){
   
   /*se relaiza un if para saber la categoria */
    if($categoriaIdPub){
        if($categoriaIdPub=="TV"){
            $categoriaIdPub=5;
        }elseif ($categoriaIdPub=="Movil"){
        
            $categoriaIdPub=2;
        }elseif($categoriaIdPub=="Pc"){
        
            $categoriaIdPub=3;
        }elseif($categoriaIdPub=="Consolas"){
            $categoriaIdPub=4;    
        }
    }else{
        $_SESSION["error_Categoria"]="no seleciono la categoria";
        $error+=1;
       
    }
    /*se crea un if para saber el estado del producto */
    if($estadoPub){
        
        if($estadoPub=="Nuevo"){
            $estadoPub=1;
        }elseif ($estadoPub=="Usado"){   
            $estadoPub=2;
        }
    }else{
        $_SESSION["error_Estado"]="no seleciono el estado del producto";
        $error+=1;
       
    }   
        /* se valida que se reciban todas las imagenes */
    if($fotoPrincipal && $imagen1 && $imagen2 && $imagen3 && $imagen4 ){
     
        $tamaño_img= $_FILES["fotoPrincipal"]["size"];
        $tamaño_img1= $_FILES["imagen1"]["size"];
        $tamaño_img2= $_FILES["imagen2"]["size"];
        $tamaño_img3= $_FILES["imagen3"]["size"];
        $tamaño_img4= $_FILES["imagen4"]["size"];
        // se lee la imagen que inserto el usuario y se guarda en variable
        $leer_fotoPrincipal= fopen($fotoPrincipal,"r");
        $leer_imagen1= fopen($imagen1,"r");
        $leer_imagen2= fopen($imagen2,"r");
        $leer_imagen3= fopen($imagen3,"r");
        $leer_imagen4= fopen($imagen4,"r");
        // se convierte la imagen en bites
        $conversion_prin=fread($leer_fotoPrincipal,$tamaño_img);
        $conversion_img1=fread($leer_imagen1,$tamaño_img1);
        $conversion_img2=fread($leer_imagen2,$tamaño_img2);
        $conversion_img3=fread($leer_imagen3,$tamaño_img3);
        $conversion_img4=fread($leer_imagen4,$tamaño_img4);
        //se quitan las barras invertidas para que deje insertar la im
        $conversion_prin=addslashes($conversion_prin);
        $conversion_img1=addslashes($conversion_img1);
        $conversion_img2=addslashes($conversion_img2);
        $conversion_img3=addslashes($conversion_img3);
        $conversion_img4=addslashes($conversion_img4);
    }else{
        $_SESSION["errorImagen"]="por favor lleno todos los campos de imagen";
        $error+=1;       
    }
           
}else{
        $_SESSION["noVerificado"]="Por Favor Verificarse Gracias";
        header("location:/Includes/publicarProducto.php");
        $error+=1;
}
//se comprueba que no hallan errores para guardar la publicacion
if($error==0){         
    $sql1="INSERT INTO publicacion  
    VALUES (NULL,'$tituloPub','$descripcionPub','$conversion_prin','$conversion_img1',
    '$conversion_img2','$conversion_img3','$conversion_img4','$interesesPub','$id',
    '$categoriaIdPub','$estadoPub');" ;
    if(mysqli_query($db,$sql1)){
        header("location: /index.php");
    }else{
        echo "no se inserto".mysqli_error($db);
    }
}else{

}

?>




