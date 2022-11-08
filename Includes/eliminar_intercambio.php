<?php 
include_once "/app/funciones/conexionDB.php";
include_once "/app/Includes/header.php";
include_once "/app/Includes/menulateral.php";
include_once "/app/funciones/masFunciones.php";
// $int_codigo=$_REQUEST["int_codigo"];
?>
 

 <!--contenido de la pagina o aside-->
  <section id="container">
    
    <div class="titulo">
    <h1>Eliminar intercambio</h1>
    </div>
    <section>
    <?php  $inter_exist =IntercambioUsuarioProveedor($db,$_SESSION["login_correcto"]["usu_codigo"])?>
        <div class="avisoEliminacion">
            <p>Esta Por eliminar el intercambio </p>
            <h4><?php echo $inter_exist["int_codigo"] ?></h4>
       

        <div class="confirmar_cancelar">
            <a href="/backend/eliminar_intercambio.php?int_codigo=<?php echo $inter_exist["int_codigo"]?>" class="Eliminar">Confirmar</a>
            <a  href="/Includes/intercambio/2intercambio.php" class="Eliminar">Cancelar</a>
        </div>
       </div>
  <?php include_once "/app/Includes/acount.php" ?>
    </section>
  </section>
  <!--limpiamos los flotados del aside -->
  <div style="clear: both"></div>

 
  <?php 
  include_once "/app/Includes/footer.php";
  
  ?>
