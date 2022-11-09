<?php 
include_once "/app/funciones/masFunciones.php";
if(isset($_SESSION["usuario"])):?>
<div class="acount">
      <a href="/Includes/datosusuario.php">Datos Personales</a>
      <a href="/Includes/publicarProducto.php">Crear Publicacion</a>
      <a href="/Includes/misPublicaciones.php">Mis publicaciones</a>
      <?php $pubUsu= ConsultarPublicacionesUsuario($db,$_SESSION["login_correcto"]["usu_codigo"]);
        $usuPub=mysqli_fetch_assoc($pubUsu);
        $intercambios_activos=IntercambioUsuarioProveedor($db,$_SESSION["login_correcto"]["usu_codigo"]);
        $tres=isset($intercambios_activos) ? $intercambios_activos:false;
        $cuatro=isset($intercambios_activos["int_exitosa"])==1 ? $intercambios_activos["int_exitosa"]==1:false;
      ?>

      <?php if(isset($usuPub) &&  $tres==false || $cuatro==1):?>
    
        <a href="/Includes/intercambio/crearIntercambio.php">Intercambio</a>
        
      <?php endif;?>
      
      <?php if($tres!=false || $cuatro!=false):?>
          <a href="/Includes/intercambio/2Intercambio.php">Opciones Intercambio</a>
        <?php endif;?>
    </div>
<script src="/js/acount.js"></script>
<?php endif;?>


<?php 
if(isset($_SESSION["usuario_administrador"])):?>
<div class="acount">
      <a href="/Includes/administrador/crudUsuarios.php">Datos Usuarios</a>
      <a href="/Includes/administrador/crudPublicacion.php">Datos Publicaciones</a>
      <a href="/Includes/administrador/crudVerificado.php">Verificicacion</a>
      <a href="/Includes/administrador/crudAdministrador.php">Administradores</a>
    </div>




<script src="/js/acount.js"></script>
<?php endif;?>
