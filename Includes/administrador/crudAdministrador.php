<?php
include_once "/wamp64/www/Exchangecity/proyectoSena/funciones/conexionDB.php";
include_once "/wamp64/www/exchangecity/proyectoSena/Includes/header.php";
include_once "/wamp64/www/exchangecity/proyectoSena/Includes/menulateral.php";
include_once "/wamp64/www/exchangecity/proyectoSena/funciones/masFunciones.php";
?>
<?php 
$sql="SELECT *FROM usuario WHERE FK_rol_codigo_ur='1'";

$consulta=mysqli_query($db,$sql);

?>



  <!--contenido de la pagina o aside-->

  <section id="container">
    <div class="titulo">
        <h1>Administradores Registrados</h1>
    </div>
    <h2 class="eliminado" ><?php echo isset($_SESSION["eliminar_adm"]) ?$_SESSION["eliminar_adm"]:"";?></h2>
    <section >
    <div class="crudUsu">
        <table>
        
            <tr class="datoCrudUsu">
                <th class="datoCrudUsu">ID</th>
                <th class="datoCrudUsu">Nombre</th>
                <th class="datoCrudUsu">Apellido</th>
                <th class="datoCrudUsu">Correo</th>
                <th class="datoCrudUsu">Documento</th>
                <th class="datoCrudUsu">Rol</th>
                <th class="datoCrudUsu">Ciudad</th>
                <th class="datoCrudUsu">Opciones</th>

            </tr>
            <?php while($row = mysqli_fetch_array($consulta)): ?>
            <tr class="datoCrudUsu">
                <th class="datoCrudUsu"><?php echo $row["usu_codigo"] ?></th>
                <th class="datoCrudUsu"><?php echo $row["usu_nombre"] ?></th>
                <th class="datoCrudUsu"><?php echo $row["usu_apellido"] ?></th>
                <th class="datoCrudUsu"><?php echo $row["usu_correo"] ?></th>
                <th class="datoCrudUsu"><?php echo $row["usu_documento"] ?></th>
                <th class="datoCrudUsu"><?php echo $row["FK_rol_codigo_ur"] ?></th>
                <th class="datoCrudUsu"><?php echo $row["FK_ciu_codigo_uc"] ?></th>
                <th class="datoCrudUsu"><a class="crudBoton" href="/exchangecity/proyectoSena/backen/administrador/administradorCrud.php?usu_codigo=<?php echo $row["usu_codigo"]?>">Eliminar</a></th>
                
            </tr>
            <?php endwhile;?>
            
        </table>
        </div>
        
    
    <?php include_once "/wamp64/www/Exchangecity/proyectoSena/Includes/acount.php" ?>
    </section>
  </section>
  <?php
  include_once "/wamp64/www/exchangecity/proyectoSena/includes/footer.php";
  ?>
  <!--limpiamos los flotados del aside -->
  <div style="clear: both"></div>

  <?php 
      unset($_SESSION["eliminar_adm"]);
  ?>