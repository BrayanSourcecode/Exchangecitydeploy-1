<?php 
  include_once("/wamp64/www/Exchangecity/proyectoSena/funciones/conexionDB.php");
    
  //se recibe el ide de la publicacion ha actualizar
 $pub_codigo=$_REQUEST["pub_codigo"];

// se reciben las de mas variables para actualizar corectamente
 $titulo = isset($_POST['tituloPublicacion']) ? $_POST['tituloPublicacion']:false;
 $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion']:false;
 $intereses= isset($_POST['intereses']) ? $_POST['intereses']:false;
 $categoriaId= isset($_POST['categoriaId']) ? $_POST['categoriaId']:false;
 $estado = isset($_POST['estado']) ? $_POST['estado']:false;
$fotoPrincipal= isset($_FILES["fotoPrincipal"]["tmp_name"]) ? $_FILES["fotoPrincipal"]["tmp_name"]:false;
 $imagen1= isset($_FILES["imagen1"]["tmp_name"]) ? $_FILES["imagen1"]["tmp_name"]:false;
 $imagen2= isset($_FILES["imagen2"]["tmp_name"]) ? $_FILES["imagen2"]["tmp_name"]:false;
 $imagen3= isset($_FILES["imagen3"]["tmp_name"]) ? $_FILES["imagen3"]["tmp_name"]:false;
 $imagen4= isset($_FILES["imagen4"]["tmp_name"]) ? $_FILES["imagen4"]["tmp_name"]:false;


 $error=array();
$sql="UPDATE publicacion SET 
pub_titulo='$titulo',
pub_descripcion='$descripcion',
pub_intereses='$intereses' WHERE pub_codigo='$pub_codigo'
";
$insertar=mysqli_query($db,$sql);

// se insertan los datos de  titulo y los otro tipo texto
if($insertar){
   
}else{
    $error+=1;
    echo"no se actualizo".mysqli_error($db) ;
}

// se comprueba la categoria 

if($categoriaId){
    if($categoriaId=="TV"){
        $categoriaId=5;
    }elseif ($categoriaId=="Movil"){
        $categoriaId=2;

    }elseif($categoriaId=="Pc"){
        $categoriaId=3;
    }elseif($categoriaId=="Consolas"){
        $categoriaId=4;    
    }else{
        $error+=1;
    }

$sql2="UPDATE publicacion SET
FK_cat_codigo_pc='$categoriaId' WHERE pub_codigo='$pub_codigo'";
$insertar2=mysqli_query($db,$sql2);
if($insertar2){
   
}else{
    echo 
    $error+=1;
}
}

if($estado){
        
    if($estado=="Nuevo"){
        $estado=1;
    }elseif ($estado=="Usado"){   
        $estado=2;
    }
    $sql3="UPDATE publicacion SET
    FK_est_codigo_pe='$estado' WHERE pub_codigo='$pub_codigo'";
    $insertar3=mysqli_query($db,$sql3);
    if($insertar3){
    }else{
        echo"mensaje:".mysqli_error($db);
        $error+=1;
    }

}  

if($fotoPrincipal){
    $nombre_img= $_FILES["fotoPrincipal"]["name"];
    $tipo_img= $_FILES["fotoPrincipal"]["type"];
    $tamaño_img= $_FILES["fotoPrincipal"]["size"];
    // se lee la imagen que inserto el usuario y se guarda en variable
        $leer_archivo= fopen($fotoPrincipal,"r");
        // se convierte la imagen en bites
        $conversion1=fread($leer_archivo,$tamaño_img);
        //se quitan las barras invertidas para que deje insertar la im
        $conversion1=addslashes($conversion1);

$sql4="UPDATE publicacion SET
pub_img_general='$conversion1'
WHERE pub_codigo='$pub_codigo'";
$insertar4=mysqli_query($db,$sql4);
if($insertar4){

}else{
    $error+=1;
    echo"".mysqli_error($db);
}

}


// imagen 1
if($imagen1){
    $nombre_img= $_FILES["imagen1"]["name"];
    $tipo_img= $_FILES["imagen1"]["type"];
    $tamaño_img= $_FILES["imagen1"]["size"];
    // se lee la imagen que inserto el usuario y se guarda en variable
        $leer_archivo= fopen($imagen1,"r");
        // se convierte la imagen en bites
        $conversion2=fread($leer_archivo,$tamaño_img);
        //se quitan las barras invertidas para que deje insertar la im
        $conversion2=addslashes($conversion2);

$sql5="UPDATE publicacion SET
pub_img1='$conversion2'
WHERE pub_codigo='$pub_codigo'";
$insertar5=mysqli_query($db,$sql5);
if($insertar5){

}else{
    $error+=1;
    echo"".mysqli_error($db);
}

}

// imagen 2

if($imagen2){
    $nombre_img= $_FILES["imagen2"]["name"];
    $tipo_img= $_FILES["imagen2"]["type"];
    $tamaño_img= $_FILES["imagen2"]["size"];
    // se lee la imagen que inserto el usuario y se guarda en variable
        $leer_archivo= fopen($imagen2,"r");
        // se convierte la imagen en bites
        $conversion3=fread($leer_archivo,$tamaño_img);
        //se quitan las barras invertidas para que deje insertar la im
        $conversion3=addslashes($conversion3);

$sql6="UPDATE publicacion SET
pub_img2='$conversion3'
WHERE pub_codigo='$pub_codigo'";
$insertar6=mysqli_query($db,$sql6);
if($insertar6){

}else{
    $error+=1;
    echo"".mysqli_error($db);
}
}

// imagen3
if($imagen3){
    $nombre_img= $_FILES["imagen3"]["name"];
    $tipo_img= $_FILES["imagen3"]["type"];
    $tamaño_img= $_FILES["imagen3"]["size"];
    // se lee la imagen que inserto el usuario y se guarda en variable
        $leer_archivo= fopen($imagen3,"r");
        // se convierte la imagen en bites
        $conversion4=fread($leer_archivo,$tamaño_img);
        //se quitan las barras invertidas para que deje insertar la im
        $conversion4=addslashes($conversion4);

$sql7="UPDATE publicacion SET
pub_img3='$conversion7'
WHERE pub_codigo='$pub_codigo'";
$insertar7=mysqli_query($db,$sql7);
if($insertar7){

}else{
    $error+=1;
    echo"".mysqli_error($db);
}
}
// imagen 4
if($imagen4){
    $nombre_img= $_FILES["imagen4"]["name"];
    $tipo_img= $_FILES["imagen4"]["type"];
    $tamaño_img= $_FILES["imagen4"]["size"];
    // se lee la imagen que inserto el usuario y se guarda en variable
        $leer_archivo= fopen($imagen4,"r");
        // se convierte la imagen en bites
        $conversion5=fread($leer_archivo,$tamaño_img);
        //se quitan las barras invertidas para que deje insertar la im
        $conversion5=addslashes($conversion5);

$sql8="UPDATE publicacion SET
pub_4='$conversion8'
WHERE pub_codigo='$pub_codigo'";
$insertar8=mysqli_query($db,$sql8);
if($insertar8){

}else{
    $error+=1;
    echo"".mysqli_error($db);
}
}


if(count($error)==0){

 header("location: /exchangecity/proyectosena/includes/misPublicaciones.php");
 $_SESSION["pub_actualizada"]="Los datos de la publicacion se  actualizaron Correctamente";
}else{
    echo"".mysqli_error($db);
}