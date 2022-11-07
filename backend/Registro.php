<?php
if(isset($_POST)){
    
     include_once "/app/funciones/conexionDB.php";
     // se guardan los valores que recibimos  en variables para despues comprobarlos
     
     $nombre= isset ($_POST["nombre"]) ? $_POST["nombre"]:false;
     $apellido= isset ($_POST["apellido"]) ? $_POST["apellido"]:false;
     $correo=  isset( $_POST["correo"]) ? $_POST["correo"]:false;
     $contraseña= isset ($_POST["password"]) ? $_POST["password"]: false;
     $tipo= isset ($_POST["RegistroOpcion"]) ? $_POST["RegistroOpcion"]:false;
     $codigo=isset ($_POST["RegistroCodigo"]) ? $_POST["RegistroCodigo"]:false;

     /* se crea un array para guardar los errores de validacion de datos */
     $error=0;
     /* se validan los datos de los nombres y apellidos */
     if(!empty($nombre) && !is_numeric($nombre) && !preg_match("/[*][.][0-9]/",$nombre)){
          $nombre=$nombre;

     }else{
          $error+=1;
          $_SESSION['nombre']="Campo vacio o nombre incorrecto";
     }
     if(!empty($apellido) && !is_numeric($apellido) && !preg_match("/[*][_][.]/",$apellido)){
          $apellido=$apellido;

     }else{
          $error+=1;
          $_SESSION["apellido"]="Campo vacio o apellido incorrecto";
     }
     // se valida que la contraseña no este vacia
     if(!empty($contraseña)){
          $contraseña=$contraseña;

     }else{
          $error+=1;
          $_SESSION["contraseña"]="la contraseña esta vacia";
     }

     //se validad que el correo no exista en la base de datos  con una consulta 
     $consulta_email="SELECT * FROM usuario WHERE usu_correo='$correo'";
     $guardado_email= mysqli_query ($db,$consulta_email);
     $email_existente=mysqli_fetch_assoc($guardado_email);

     //se valida el correo  cuando ya tengamos la consulta de si hay algun correo igual o no hay
     if(!isset($email_existente)){
          if(!empty($correo) && filter_var($correo,FILTER_VALIDATE_EMAIL)){
          $correo=$correo;
          }else{
               $error+=1;
               $_SESSION["correo"]="Correo vacio";
              
          }
     }else{
          $error+=1;
          $_SESSION["correo"]="El correo ya esta registrado";
          
     }

     /*validacion de la password */
     if(!empty($contraseña)){
          $contraseña=$contraseña;
     }else{
          $error+=1;
          $_SESSION["password"] = "La contraseña esta vacia";
     }

// se valida el tipo de usuario y el codigo 
     if(!empty($tipo)){     
          if ($tipo =="Administrador" && $codigo =="2506"){
               $tipo=1;
               $codigo=$codigo;
               
          }elseif($tipo =="Usuario"){
               $tipo = 2;      
          }else{
               $error+=1;
               $_SESSION["codigo"]="el codigo no es correcto";
          }
     }

// se comprueba que no exista ningun error antes de guardar los datos en la base de datos 
     if($error==0){
            /* si no hay errores Se crifra la contrasena*/ 
              $password_segura=password_hash("$contraseña",PASSWORD_BCRYPT,['cost'=>4]);
              /* depues de que no halla errores a hora si se guardan los datos en bd*/
              $add_usuario = "INSERT INTO usuario  VALUES(NULL,'$nombre','$apellido','$correo','$password_segura',NULL,'$tipo',NULL,NULL,NULL,NULL,NULL,NULL)"; 
              $guardar_usurios = mysqli_query($db,$add_usuario);

      /* se  comprueba si el registro es corrrecto o fallo y se crea una secion para mostrarla   */
            if($guardar_usurios){
                 $_SESSION["registro_completado"] = "el registro se ha completado con exito";

           
           
            }else{
                 $_SESSION["registro_fallo"] =" el registro  fallo";

            }

            }else{
                 /*se crea una secion para mostrarle al usuario los los errores si hay */
                 $_SESSION["error"]= $error ;

            }
      header("location:/app/includes/registro.php");
      }
?>
