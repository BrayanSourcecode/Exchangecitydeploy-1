<?php
include_once "/wamp64/www/Exchangecity/proyectoSena/funciones/conexionDB.php";
include_once "/wamp64/www/exchangecity/proyectoSena/Includes/header.php";
include_once "/wamp64/www/exchangecity/proyectoSena/Includes/menulateral.php";
include_once "/wamp64/www/exchangecity/proyectoSena/funciones/masFunciones.php";
?>
<?php 


$sql="SELECT * FROM datos_verificado";

$consulta=mysqli_query($db,$sql);


?>



  <!--contenido de la pagina o aside-->

  <section id="container">
    <div class="titulo">
        <h1>Usuarios Verificados</h1> 
    </div>
    <h2 class="eliminado" ><?php echo isset($_SESSION["eliminar_ver"]) ?$_SESSION["eliminar_ver"]:"";?></h2>
    <section >
    <div class="crudUsu">
        <table>
        
            <tr class="datoCrudUsu">
                <th class="datoCrudUsu">ID</th>
                <th class="datoCrudUsu">Imagen Cedula</th>
                <th class="datoCrudUsu">Imagen Direccion</th>    
                <th class="datoCrudUsu">Opciones</th>

            </tr>
            <?php while($row = mysqli_fetch_array($consulta)): ?>
            <tr class="datoCrudUsu">
                <th class="datoCrudUsu"><?php echo $row["FK_dat_codigo_du"] ?></th>
                <th class="datoCrudUsu"> <img class="img_editar" src="data:image/JPG;base64,<?php echo base64_encode($row["dat_img_cedula"]);?>" /></th>
                <th class="datoCrudUsu"><img class="img_editar" src="data:image/JPG;base64,<?php echo base64_encode($row["dat_direccion"]);?>" /></th>
                <th class="datoCrudUsu"><a class="crudBoton" href="/exchangecity/proyectoSena/backend/administrador/verificadoCrud.php?usu_codigo=<?php echo $row["FK_dat_codigo_du"] ?>">Eliminar</a></th>
                
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
      unset($_SESSION["eliminar_ver"]);
  ?>