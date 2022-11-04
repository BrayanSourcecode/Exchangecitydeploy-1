<?php
    include_once("/wamp64/www/Exchangecity/proyectoSena/funciones/conexionDB.php");
    
     //se saca el id del usuario para comprovar la actualizacion de datos
    $id=$_SESSION["login_correcto"]["usu_codigo"];

// se reciben las de mas variables para actualizar corectamente
    $nombre = isset($_POST['nombre']) ? $_POST['nombre']:false;
    $apellido = isset($_POST['apellido']) ? $_POST['apellido']:false;
    $correo= isset($_POST['correo']) ? $_POST['correo']:false;
    $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion']:false;
    $documento = isset($_POST['documento']) ? $_POST['documento']:false;
    $ciudad = isset($_POST['ciudad']) ? $_POST['ciudad']:false;
    $contacto = isset($_POST['contacto']) ? $_POST['contacto']:false;
    $redSocial = isset($_POST['redSocial']) ? $_POST['redSocial']:false;
    $imagen = isset($_FILES["imagenPerfil"]["tmp_name"]) ? $_FILES["imagenPerfil"]["tmp_name"]:false;

    
 

    $sql="UPDATE usuario SET
    usu_nombre='$nombre',
    usu_apellido='$apellido',
    usu_correo='$correo',
    usu_documento='$documento',
    usu_contacto='$contacto',
    usu_descripcion='$descripcion',
    usu_red_social='$redSocial' WHERE usu_codigo='$id'";

    $insetar=mysqli_query($db,$sql);
    if($insetar){
        $_SESSION["actualizacion_correcta"]="Los datos se actualizaron correctamente";
        $_SESSION["login_correcto"]["usu_nombre"]=$nombre;
        $_SESSION["login_correcto"]["usu_apellido"]=$apellido;
        $_SESSION["login_correcto"]["usu_correo"]=$correo;
        $_SESSION["login_correcto"]["usu_documento"]=$documento;
        $_SESSION["login_correcto"]["usu_contacto"]=$contacto;
        $_SESSION["login_correcto"]["usu_descripcion"]=$descripcion;
        $_SESSION["login_correcto"]["usu_red_social"]=$redSocial;
            header("location:/exchangecity/proyectosena/includes/datosusuario.php");
    }else{
        $_SESSION["actualizacion_fallo"]="la actualizacion fallo intentalo de nuevo";
        header("location:/exchangecity/proyectosena/includes/datosusuario.php");
    }



//SE VALIDA QUE SE RECIBA ALGUNA IMAGEN ANTES DE ACTUALIZAR
    if($imagen){
        $nombre_img= $_FILES["imagenPerfil"]["name"];
        $tipo_img= $_FILES["imagenPerfil"]["type"];
        $tamaño_img= $_FILES["imagenPerfil"]["size"];
        // se lee la imagen que inserto el usuario y se guarda en variable
            $leer_archivo= fopen($imagen,"r");
            // se convierte la imagen en bites
            $conversion=fread($leer_archivo,$tamaño_img);
            //se quitan las barras invertidas para que deje insertar la im
            $conversion=addslashes($conversion);

            $sql1="UPDATE usuario SET
            usu_img_perfil='$conversion'
            WHERE usu_codigo='$id'";
            
            $insetar1=mysqli_query($db,$sql1);
            if($insetar1){
                $_SESSION["imagen_correcta"]="la imagen se actualizo por favor haga login nuevamente para visualizar la imagen";
                $_SESSION["login_correcto"]["usu_img_perfil"]=$conversion;
                header("location: /exchangecity/proyectosena/includes/datosusuario.php");
            }else{
                $_SESSION["imagen_fallo"]="La imagen no se actualizo";
                header("location: /exchangecity/proyectosena/includes/datosusuario.php");
            }

        }


// SE VALIDA QUE ID DE CIUDDA SE RECIBE PARA GUARDARLO EN LA BASE DE DATOS
  if($ciudad){
    echo"si entro ala ciudad";
    if($ciudad=="Medellin"){
        $ciudad=2;
    }elseif($ciudad=="Cartagena"){
        $ciudad=3;
    }elseif($ciudad=="Bogota"){
        $ciudad=4;
    }

      $sql2="UPDATE usuario SET
      FK_ciu_codigo_uc='$ciudad'
        WHERE usu_codigo='$id'";
        $insetar2=mysqli_query($db,$sql2);
        if($insetar2){
            $_SESSION["tipo_correcto"]="la ciudad se actualizo correctamente";
            $_SESSION["login_correcto"]["FK_ciu_codigo_uc"]=$ciudad;
            header("location:/exchangecity/proyectosena/includes/datosusuario.php");
        }else{
            $_SESSION["tipo_fallo"]="la imagen se actualizo correctamente";
            header("location:/exchangecity/proyectosena/includes/datosusuario.php");
        }

  }
   

?>

