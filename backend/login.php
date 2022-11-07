<?php
  if(isset($_POST)){
    /* si existe post se hace la conexion ala base de datos*/
    include_once "/app/funciones/conexionDB.php";
    /* se crean variables para poder validar los datos  */
    $correo=  isset( $_POST["correo"]) ? $_POST["correo"]:false;
     $contraseña = isset($_POST["password"]) ? $_POST["password"]:false;

    /* se  crea un array para guardar los errores*/
    $error=0;
    
   /*se crea la consulta para verificar si el  correo  existe*/
    $consulta_email="SELECT * FROM usuario WHERE usu_correo='$correo'";
     $guardar_email = mysqli_query($db,$consulta_email);
     $datos_usuario=mysqli_fetch_assoc($guardar_email);

   /*si el correo existe entramos a verificar la password */
   if(isset($datos_usuario)){
       $verifi_password=password_verify($contraseña, $datos_usuario["usu_password"]);
    /*verificamos que la coontraseña que ingreso este guardada */
        if($contraseña==$verifi_password){
            
            $_SESSION["login_correcto"]=$datos_usuario;
            
            $tipo=$_SESSION["login_correcto"]["FK_rol_codigo_ur"];
            if($tipo==1){
                $_SESSION["usuario_administrador"]=$_SESSION["login_correcto"];
            }else{
                $_SESSION["usuario"]=$_SESSION["login_correcto"];
            }

        
        }else{
            $error+=1;
            $_SESSION["contrasena_mala"]="contraseña incorrecta ";
        }
        

    }else{
        $error+=1;
       $_SESSION["correo_erroneo"]="correo no registrado o campo vacio";
   }
   /*se comprueba que el campo contraseña que no sea vacio */
   if(!empty($contraseña)){
    $contraseña=$contraseña;
    }else{
        $error+=1;
        $_SESSION["password_vacia"] = "la contraseña esta vacia";
    }
    //si hay errores los mostramos si no hay mostramos la seccion en el index
if(!$error==0){
    header("location: /includes/login.php");
}else{
    header("location: ../index.php");
}
    

}


  
?>
