<?php
include_once "/wamp64/www/Exchangecity/proyectoSena/funciones/conexionDB.php";
include_once "/wamp64/www/exchangecity/proyectoSena/Includes/header.php";
include_once "/wamp64/www/exchangecity/proyectoSena/Includes/menulateral.php";
include_once "/wamp64/www/Exchangecity/proyectoSena/funciones/masFunciones.php";
?>

<section id="container">
  <div class="titulo">
    <h1>Segundo Intercambio</h1>
  </div>
  <h2 class="eliminado" ><?php echo isset($_SESSION["intercambio_creado_mensaje"]) ?$_SESSION["intercambio_creado_mensaje"]:"";?></h2>

 
  <section>
    <form class="publicarProductos" action="/exchangecity/PROYECTOSENA/backend/intercambio/intercambioDirec.php" enctype="multipart/form-data" method="POST">
    <h2 class="eliminado" >Opciones De Intercambio</h2>
      <?php  $inter_exist=IntercambioUsuarioProveedor($db,$_SESSION["login_correcto"]["usu_codigo"])?>
      <a  href="/exchangecity/proyectoSena/Includes/eliminar_intercambio.php" class="Eliminar actualizarDatos">Eliminar</a> 
      <a  href="/exchangecity/proyectoSena/backend/intercambio/intercambioDirec.php?int_codigo=<?php  echo $inter_exist["int_codigo"];?>" class="Eliminar actualizarDatos">Intercambio Finalizado</a>   
        
    </form>


    <?php include_once "/wamp64/www/Exchangecity/proyectoSena/Includes/acount.php" ?>
  </section>
</section>
<!--limpiamos los flotados del aside -->
<div style="clear: both"></div>


<?php
include_once "/wamp64/www/exchangecity/proyectoSena/Includes/footer.php"
?>

<?php
  unset($_SESSION["usuario_not_existe"]);
  unset($_SESSION["propietario_not_existe"]);
  unset($_SESSION["intercambio_creado_mensaje"]);
?>