<?php 
include_once "/wamp64/www/Exchangecity/proyectoSena/funciones/conexionDB.php";
include_once "/wamp64/www/exchangecity/proyectoSena/Includes/header.php";
include_once "/wamp64/www/exchangecity/proyectoSena/Includes/menulateral.php";
include_once "/wamp64/www/Exchangecity/proyectoSena/funciones/masFunciones.php";

$tipoCat=$_REQUEST["tipo"];
?>
   <!--contenido de la pagina o aside-->
  
   <section id="container">
    <div class="titulo">
      <h1>Categoria <?php echo $tipoCat?></h1>
    </div>
    <?php 
    /*convertimos las categoria a id */
        if($tipoCat=="TV"){
              $tipoCat=5;
        }elseif ($tipoCat=="Movil"){
              $tipoCat=2;
        }elseif ($tipoCat=="Pc"){
              $tipoCat=3;
        }elseif ($tipoCat=="Consolas"){
              $tipoCat=4;
        }
        /* consultamos con una funcion la tabla publicaiones  */
      $PublicacionesCat= ConsultarPublicacionCat($db,$tipoCat);
        
      ?>
    <section>
      <!-- recorremos mientras exitan publicaciones y consultamos categoria -->
    <?php while($publicacionCat=mysqli_fetch_assoc($PublicacionesCat)):?>
      <?php $categoriaPublicaciones=ConsultarCategoriaPublicacion($db,$publicacionCat["FK_cat_codigo_pc"]) ;
            $nombreCategoria=mysqli_fetch_assoc($categoriaPublicaciones);
           
      ?>
      <div class="cars">
          <h3><?php echo $nombreCategoria["cat_tipo"]?></h3>
          <img src="data:image/JPG;base64,<?php echo base64_encode($publicacionCat["pub_img_general"]);?>" />
          <div class="conterCars">
            <a href="/exchangecity/PROYECTOSENA/includes/descripcion.php?"><h2><?php echo substr($publicacionCat["pub_titulo"],0,15);?></h2></a>
            <p><?php echo substr($publicacionCat["pub_descripcion"],0,30)."...";?></p>
            <!-- consultamos el estado de las publicaciones y lo monstramos -->
           <?php  $estadoPublicacion= ConsultarEstadoPublicacion($db,$publicacionCat["FK_est_codigo_pe"]);
              $nombreEstado=mysqli_fetch_assoc($estadoPublicacion); ?>
              <p class="estado"><?php echo $nombreEstado["est_nombre"]?></p>
          </div>
      </div>
     <?php endwhile;?>


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
  <?php include_once "/wamp64/www/Exchangecity/proyectoSena/Includes/acount.php" ?>
    </section>
  </section>
  <!--limpiamos los flotados del aside -->
  <div style="clear: both"></div>









<?php 
  include_once "/wamp64/www/exchangecity/proyectoSena/Includes/footer.php";
  
?>