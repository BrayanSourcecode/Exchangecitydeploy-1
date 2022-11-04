<?php 
include_once "/wamp64/www/Exchangecity/proyectoSena/funciones/conexionDB.php";
include_once "/wamp64/www/exchangecity/proyectoSena/Includes/header.php";
include_once "/wamp64/www/exchangecity/proyectoSena/Includes/menulateral.php";
include_once "/wamp64/www/Exchangecity/proyectoSena/funciones/masFunciones.php";

?>

  

 <!--contenido de la pagina o aside-->
  <section id="container">
  <div class="titulo">
            <h1>Editar Publicaciones</h1>
            
        </div>
    <section>
    <h2 class="eliminado" ><?php echo isset($_SESSION["publicacion_eliminada"]) ?$_SESSION["publicacion_eliminada"]:"";?></h2>
    <h2 class="eliminado" ><?php echo isset($_SESSION["pub_actualizada"]) ?$_SESSION["pub_actualizada"]:"";?></h2>
        <?php  $datosPublicacion=ConsultarPublicacionesUsuario($db,$_SESSION["login_correcto"]["usu_codigo"]); ?>
        <?php  while($publicacionUsuario=mysqli_fetch_assoc($datosPublicacion)):?>
            <?php $categoriaPublicacion=ConsultarCategoriaPublicacion($db,$publicacionUsuario["FK_cat_codigo_pc"]) ;
                $nombreCategoria=mysqli_fetch_assoc($categoriaPublicacion); 
            ?>
                <div class="carsBottom">
                    <div class="cars">
                        <h3><?php echo $nombreCategoria["cat_tipo"];?></h3>
                        <img src="data:image/JPG;base64,<?php echo base64_encode($publicacionUsuario["pub_img_general"]);?>" />
                        <div class="conterCars">
                        <a href="/exchangecity/PROYECTOSENA/includes/descripcion.php?pub_codigo=<?php echo$publicacionUsuario["pub_codigo"] ?>"><h2><?php echo substr($publicacionUsuario["pub_titulo"],0,15);?></h2></a>
                        <p><?php echo substr($publicacionUsuario["pub_descripcion"],0,30)."...";?></p>
                        <?php  $estadoPublicacion=ConsultarEstadoPublicacion($db,$publicacionUsuario["FK_est_codigo_pe"]);
                            $nombreEstado=mysqli_fetch_assoc($estadoPublicacion);
                        ?>
                        <p class="estado"><?php echo $nombreEstado["est_nombre"];?></p>
                        </div>
                    </div>
                   
                    <a class="editar" href="/exchangecity/proyectoSena/Includes/editarPublicacion.php?pub_codigo=<?php echo $publicacionUsuario["pub_codigo"] ?>">Editar</a>
                   
                </div>
               
        <?php endwhile; ?> 
        <script src="/exchangecity/PROYECTOSENA/js/editarPublicacion.js"></script>
        <?php include_once "/wamp64/www/Exchangecity/proyectoSena/Includes/acount.php" ?>
    </section>
  </section>
  <!--limpiamos los flotados del aside -->
  <div style="clear: both"></div>

 
  <?php 
  include_once "/wamp64/www/exchangecity/proyectoSena/Includes/footer.php";
  unset($_SESSION["publicacion_eliminada"]);
  
  
  ?>
