<?php 
include_once "/wamp64/www/Exchangecity/proyectoSena/funciones/conexionDB.php";
include_once "/wamp64/www/exchangecity/proyectoSena/Includes/header.php";
include_once "/wamp64/www/exchangecity/proyectoSena/Includes/menulateral.php";
include_once "/wamp64/www/Exchangecity/proyectoSena/funciones/masFunciones.php";

?>
 

 <!--contenido de la pagina o aside-->
  <section id="container">
    <div class="titulo">
      <h1>Productos Publicados</h1>
    </div>
    <h2 class="eliminado" ><?php echo isset($_SESSION["intercambio_eliminado"]) ?$_SESSION["intercambio_eliminado"]:"";?></h2>
    <h2 class="eliminado" ><?php echo isset($_SESSION["intercambio_finalizado"]) ?$_SESSION["intercambio_finalizado"]:"";?></h2>
    <section>
       
    <?php $publicaciones=ConsultarPublicaciones($db); ?>
    <?php while($publicacion=mysqli_fetch_assoc($publicaciones)) : ?>
      <?php $categoriaPublicacion=ConsultarCategoriaPublicacion($db,$publicacion["FK_cat_codigo_pc"]) ;
            $nombreCategoria=mysqli_fetch_assoc($categoriaPublicacion); 
      ?>
      <div class="cars">
          <h3><?php echo $nombreCategoria["cat_tipo"];?></h3>
          <img src="data:image/JPG;base64,<?php echo base64_encode($publicacion["pub_img_general"]);?>" />
          <div class="conterCars">
            <a href="/exchangecity/PROYECTOSENA/includes/descripcion.php?pub_codigo=<?php echo$publicacion["pub_codigo"] ?>"><h2><?php echo substr($publicacion["pub_titulo"],0,15);?></h2></a>
            <p><?php echo substr($publicacion["pub_descripcion"],0,30)."...";?></p>
            <?php  $estadoPublicacion= ConsultarEstadoPublicacion($db,$publicacion["FK_est_codigo_pe"]);
              $nombreEstado=mysqli_fetch_assoc($estadoPublicacion);
            ?>
            <p class="estado"><?php echo $nombreEstado["est_nombre"]?></p>
          </div>
      </div>
      <?php endwhile; ?>
      <?php  isset($_SESSION["error"]["nombre"]) ? "<div class='prueba'>".$_SESSION["error"]["nombre"]."</div>":"";?>
      <!-- paginacion -->
      <!-- <div class="contenidoPaginacion">
        <div class="paginas">
          <a class="pagi index" href="/PROYECTOSENA/index.php">Pagina Inicio ...</a>
          <a class="pagi" href="/PROYECTOSENA/paginacion/paginacion1.php">1</a>
          <a class="pagi" href="/PROYECTOSENA/paginacion/paginacion2.php">2</a>
          <a class="pagi" href="/PROYECTOSENA/paginacion/paginacion3.php">3</a>
          <a class="pagi" href="/PROYECTOSENA/paginacion/paginacion4.php">4</a>
          <a class="pagi"href="/PROYECTOSENA/paginacion/paginacion5.php">5</a>
      </div>
    </div> -->
  <?php include_once "/wamp64/www/Exchangecity/proyectoSena/Includes/acount.php";
    unset($_SESSION["intercambio_eliminado"]);
    unset($_SESSION["intercambio_finalizado"]);
    
  ?>
    </section>
  </section>
  <!--limpiamos los flotados del aside -->
  <div style="clear: both"></div>



  <?php 
  include_once "/wamp64/www/exchangecity/proyectoSena/Includes/footer.php"
  ?>