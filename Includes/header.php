<!-- <?php session_start();?> -->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/css/index.css">
  <link rel="stylesheet" href="/css/login.css">
  <link rel="stylesheet" href="/css/registro.css">
  <link rel="stylesheet" href="/css/datosusuario.css">
  <link rel="stylesheet" href="/css/publicarProductos.css">
  <link rel="stylesheet" href="/css/editarPublicacion.css">
  <link rel="stylesheet" href="/css/descripcion.css">
  <link rel="stylesheet" href="/css/intercambio/crearIntercambio.css">
  <link rel="stylesheet" href="/css/avisoEliminacion.css">
  <link rel="stylesheet" href="/css/crudUsuario.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
 
  <title>Contenido</title>
</head>

<body>
  <!--header-->
  <header id="header" >
    
    <div class="logo">
      <a href="/index.php">
        <span class="material-symbols-outlined iconoLogo">
            compare_arrows
        </span>
      </a>
      
    </div>
    <div class="iniciarSesion">
    
      
      <?php  if(isset($_SESSION["usuario"])):?>
          <div class="bienvenido">
              <h3>Bienvenido  <?php echo $_SESSION["usuario"]["usu_nombre"] ." ".$_SESSION["usuario"]["usu_apellido"]?></h3>
          </div>
         
          
          <a class="cerrar_session" href="/backend/cerrar_session.php" >cerra  sesion</a>
      <?php endif; ?>
      <?php if(isset($_SESSION["usuario_administrador"])):?>
            <div class="bienvenido">
            <h3>Bienvenido Administrador <?php echo $_SESSION["usuario_administrador"]["usu_nombre"] ." ".$_SESSION["usuario_administrador"]["usu_apellido"]?></h3>
            </div>

            <a class="cerrar_session" href="/backend/cerrar_session.php" >cerra  sesion</a>

          <?php endif; ?>
          
      
      

      

      <?php if(!isset($_SESSION["usuario"]) && !isset($_SESSION["usuario_administrador"])): ?> 
        <div class="registro_iniciar">
          <a class="inicioSesion" href="/Includes/login.php">Login</a>
          <a  class="registroUsuario" href="/Includes/registro.php">Registrarse</a>
        </div>
      <?php endif; ?>
    </div>
  </header>

  
  
  <?php 
  /*sesisones del registro */
      unset($_SESSION["error"]);
      unset($_SESSION["registro_completo"]);
      unset($_SESSION["registro_fallo"]);

  /*sesiones del login */
      unset($_SESSION["login_erroneo"]);
      unset($_SESSION["contrasena_erronea"]);
      unset($_SESSION["password"]);
      
  ?>



