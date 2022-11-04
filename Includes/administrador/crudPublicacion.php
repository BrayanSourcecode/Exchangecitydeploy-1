<?php
include_once "/wamp64/www/Exchangecity/proyectoSena/funciones/conexionDB.php";
include_once "/wamp64/www/exchangecity/proyectoSena/Includes/header.php";
include_once "/wamp64/www/exchangecity/proyectoSena/Includes/menulateral.php";
include_once "/wamp64/www/exchangecity/proyectoSena/funciones/masFunciones.php";
?>
<?php 
$sql="SELECT pub_codigo,pub_titulo,pub_descripcion,pub_intereses,FK_dat_codigo_pd_usu,
FK_cat_codigo_pc ,FK_est_codigo_pe,pub_img_general,pub_img1,pub_img2,pub_img3,pub_img4  FROM publicacion";

$consulta=mysqli_query($db,$sql);

?>



  <!--contenido de la pagina o aside-->

  <section id="container">
    <div class="titulo">
        <h1>Publicaciones Registradas</h1>
    </div>
    <h2 class="eliminado" ><?php echo isset($_SESSION["publicacion_eliminada"]) ?$_SESSION["publicacion_eliminada"]:"";?></h2>
    <section >
    <div class="crudUsu">
        <table>
        
            <tr class="datoCrudUsu">
                <th class="datoCrudUsu">ID_Pub</th>
                <th class="datoCrudUsu">Titulo</th>
                <th class="datoCrudUsu">Descripcion</th>
                <th class="datoCrudUsu">Intereses</th>
                <th class="datoCrudUsu">Verificado</th>
                <th class="datoCrudUsu">Categoria</th>
                <th class="datoCrudUsu">Estado</th>
                <th class="datoCrudUsu">Imagen Principal</th>
                <th class="datoCrudUsu">Imagen 1</th>
                <th class="datoCrudUsu">Imagen 2</th>
                <th class="datoCrudUsu">Imagen 3</th>
                <th class="datoCrudUsu">Imagen 4</th>

                <th class="datoCrudUsu">Opciones</th>

            </tr>
            <?php while($row = mysqli_fetch_array($consulta)): ?>
            <tr class="datoCrudUsu">
                <th class="datoCrudUsu"><?php echo $row["pub_codigo"] ?></th>
                <th class="datoCrudUsu"><?php echo $row["pub_titulo"] ?></th>
                <th class="datoCrudUsu"><?php echo $row["pub_descripcion"] ?></th>
                <th class="datoCrudUsu"><?php echo $row["pub_intereses"] ?></th>
                <th class="datoCrudUsu"><?php echo $row["FK_dat_codigo_pd_usu"] ?></th>
                <th class="datoCrudUsu"><?php echo $row["FK_cat_codigo_pc"] ?></th>
                <th class="datoCrudUsu"><?php echo $row["FK_est_codigo_pe"] ?></th>
                <th class="datoCrudUsu"><img class="img_editar" src="data:image/JPG;base64,<?php echo base64_encode($row["pub_img_general"]);?>" /></</th>
                <th class="datoCrudUsu"><img class="img_editar" src="data:image/JPG;base64,<?php echo base64_encode($row["pub_img1"]);?>" /></</th>
                <th class="datoCrudUsu"><img class="img_editar" src="data:image/JPG;base64,<?php echo base64_encode($row["pub_img2"]);?>" /></</th>
                <th class="datoCrudUsu"><img class="img_editar" src="data:image/JPG;base64,<?php echo base64_encode($row["pub_img3"]);?>" /></</th>
                <th class="datoCrudUsu"><img class="img_editar" src="data:image/JPG;base64,<?php echo base64_encode($row["pub_img4"]);?>" /></</th>
                <th class="datoCrudUsu"><a class="crudBoton" href="/exchangecity/proyectoSena/backend/administrador/eliminarPubCrud.php?pub_codigo=<?php echo $row["pub_codigo"] ?>">Eliminar</a></th>
                
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
      unset($_SESSION["publicacion_eliminada"]);
  ?>


  