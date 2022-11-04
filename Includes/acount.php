<?php 
include_once "/wamp64/www/Exchangecity/proyectoSena/funciones/masFunciones.php";
if(isset($_SESSION["usuario"])):?>
<div class="acount">
      <a href="/exchangecity/proyectoSena/Includes/datosusuario.php">Datos Personales</a>
      <a href="/exchangecity/proyectoSena/Includes/publicarProducto.php">Crear Publicacion</a>
      <a href="/exchangecity/proyectoSena/Includes/misPublicaciones.php">Mis publicaciones</a>
      <?php $pubUsu= ConsultarPublicacionesUsuario($db,$_SESSION["login_correcto"]["usu_codigo"]);
        $usuPub=mysqli_fetch_assoc($pubUsu);
        $intercambios_activos=IntercambioUsuarioProveedor($db,$_SESSION["login_correcto"]["usu_codigo"]);
        $tres=isset($intercambios_activos) ? $intercambios_activos:false;
        $cuatro=isset($intercambios_activos["int_exitosa"])==1 ? $intercambios_activos["int_exitosa"]==1:false;
      ?>

      <?php if(isset($usuPub) &&  $tres==false || $cuatro==1):?>
    
        <a href="/exchangecity/proyectoSena/Includes/intercambio/crearIntercambio.php">Intercambio</a>
        
      <?php endif;?>
      
      <?php if($tres==false || $cuatro==false):?>
          <a href="/exchangecity/proyectoSena/Includes/intercambio/2Intercambio.php">Opciones Intercambio</a>
        <?php endif;?>
    </div>
<script src="/exchangecity/PROYECTOSENA/js/acount.js"></script>
<?php endif;?>


<?php 
if(isset($_SESSION["usuario_administrador"])):?>
<div class="acount">
      <a href="/exchangecity/proyectoSena/Includes/administrador/crudUsuarios">Datos Usuarios</a>
      <a href="/exchangecity/proyectoSena/Includes/administrador/crudPublicacion.php">Datos Publicaciones</a>
      <a href="/exchangecity/proyectoSena/Includes/administrador/crudVerificado.php">Verificicacion</a>
      <a href="/exchangecity/proyectoSena/Includes/administrador/crudAdministrador.php">Administradores</a>
    </div>




<script src="/exchangecity/PROYECTOSENA/js/acount.js"></script>
<?php endif;?>