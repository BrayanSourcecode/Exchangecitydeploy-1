<?php 
include_once "/app/funciones/conexionDB.php";
include_once "/app/Includes/header.php";
include_once "/app/Includes/menulateral.php";
include_once "/app/funciones/masFunciones.php";
$usuario=$_REQUEST["usu_codigo"];
?>
 

 <!--contenido de la pagina o aside-->
  <section id="container">
    
    <div class="titulo">
    <h1>Eliminar Cuenta</h1>
    </div>
    <section>
        <div class="avisoEliminacion">
            <p>Esta Por eliminar la cuenta con el nombre</p>
            <h4><?php echo $_SESSION["login_correcto"]["usu_nombre"] ?></h4>
            <p>Esta Por eliminar la cuenta con el apellido</p>
                <h4><?php echo $_SESSION["login_correcto"]["usu_apellido"] ?></h4>
            <p>Esta Por eliminar la cuenta con el correo </p>
                <h4><?php echo $_SESSION["login_correcto"]["usu_correo"] ?></h4>

        <div class="confirmar_cancelar">
            <a href="/backend/eliminarCuenta.php?usu_codigo=<?php echo $usuario;?>" class="Eliminar">Confirmar</a>
            <a  href="/Includes/datosusuario.php" class="Eliminar">Cancelar</a>
        </div>
       </div>
  <?php include_once "/app/Includes/acount.php" ?>
    </section>
  </section>
  <!--limpiamos los flotados del aside -->
  <div style="clear: both"></div>

 
  <?php 
  include_once "/app/proyectoSena/Includes/footer.php"
  ?>
