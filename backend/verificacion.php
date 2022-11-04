<?php
    include_once "/wamp64/www/Exchangecity/proyectoSena/funciones/conexionDB.php";
    $id=$_SESSION["login_correcto"]["usu_codigo"];
    $imgCedula= isset ($_FILES["imagenCedula"]["tmp_name"]) ? $_FILES["imagenCedula"]["tmp_name"]:false;
    $imgDireccion= isset ($_FILES["imagenDireccion"]["tmp_name"]) ? $_FILES["imagenDireccion"]["tmp_name"]:false;
     var_dump($imgCedula);

    if($imgCedula && $imgDireccion){
       
        $tamaño_img= $_FILES["imagenCedula"]["size"];
        $tamaño_img1= $_FILES["imagenDireccion"]["size"];

        $leer_imgCedula= fopen($imgCedula,"r");
        $leer_imgDireccion= fopen($imgDireccion,"r");

        $convercion1=fread($leer_imgCedula,$tamaño_img);
        $convercion2=fread($leer_imgDireccion,$tamaño_img1);

        $convercion1=addslashes($convercion1);
        $convercion2=addslashes($convercion2);

        $add_verificacion="INSERT INTO datos_verificado VALUES('$id','$convercion1','$convercion2')";

       if (mysqli_query($db,$add_verificacion)){
          echo "se inserto en la base de datos";
          header("location:/exchangecity/proyectosena/includes/datosusuario.php");
       }else{
         echo "mensaje: " .mysqli_error($db);
       }

       

    }else{
        echo "no entro ";
        $_SESSION["errorImagenes"]="no se pudieron insertar las imagenes";
    }

    

        
    
?>

