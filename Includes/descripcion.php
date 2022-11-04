<?php 
include_once "/wamp64/www/Exchangecity/proyectoSena/funciones/conexionDB.php";
include_once "/wamp64/www/exchangecity/proyectoSena/Includes/header.php";
include_once "/wamp64/www/exchangecity/proyectoSena/Includes/menulateral.php";
include_once "/wamp64/www/exchangecity/proyectoSena/funciones/masFunciones.php";

?>

<?php $pub_codigo=$_REQUEST["pub_codigo"];
    $datosPublicacion=ConsultarDescripcionPublicacion($db,$pub_codigo);
    $descripcionPublicacion=mysqli_fetch_assoc($datosPublicacion);
?>
  


  <!--contenido de la pagina o aside-->
  <section id="container">
    <div class="titulo">
      <h1>Descripcion</h1>
    </div>
    <article>
        <div class="producto">
        <img src="data:image/JPG;base64,<?php echo base64_encode($descripcionPublicacion["pub_img_general"]);?>" />
        </div>
        <div class="descricion">
            <h2><?php echo $descripcionPublicacion["pub_titulo"]?></h2>
            <div class="valoracion">
                <div>
                    <p>valoraccion</p>
                    <span class="material-symbols-outlined">
                        star
                    </span>
                    <p> 3.6</p>
                </div>
                <div>
                    <p>Trasaciones completadas</p>
                    <span class="material-symbols-outlined">
                        sync_alt
                    </span>
                    <p> 3.6</p>
                </div>
                <div>
                    <?php $usuarioVerificado=ConsultarDatosVerificado($db);
                    $datosVerificado=mysqli_fetch_assoc($usuarioVerificado);
                    ?>
                    <p>verificado<p>
                    <span class="material-symbols-outlined">
                        done_outline
                    </span>
                    
                </div>
            </div>
            <div class="parrafo">
                <p>Descripcion: <?php echo $descripcionPublicacion["pub_descripcion"]?></p>
                <p>Intereses: <?php echo $descripcionPublicacion["pub_intereses"]?></p>
            </div>
          
            <div class=" info">
              <div>
                <h2>Ofreser Intercambio</h2>
              </div>
              <div class="infoButton">
                <button class="buttton whatsapp">Whatsapp</button>
                <button class="buttton facebook">Facebook</button>
                <button class="buttton telegram">Telegram</button>
              </div>
            </div>
        </div>  
    </article>
    <section class="fotos">
        <div class="galeria">
        <img src="data:image/JPG;base64,<?php echo base64_encode($descripcionPublicacion["pub_img1"]);?>" />
        <img src="data:image/JPG;base64,<?php echo base64_encode($descripcionPublicacion["pub_img2"]);?>" />
        <img src="data:image/JPG;base64,<?php echo base64_encode($descripcionPublicacion["pub_img3"]);?>" />
        <img src="data:image/JPG;base64,<?php echo base64_encode($descripcionPublicacion["pub_img4"]);?>" />
            <!-- <img src="/exchangecity/PROYECTOSENA/imagenes/conteiner/computador.jfif" alt="">
            <img src="/exchangecity/PROYECTOSENA/imagenes/conteiner/televisor.jfif" alt=""> -->
        </div>
        <div class="galeriaPrincipal">
            <div class="galeriaInterna">
                <img src="/exchangecity/PROYECTOSENA/imagenes/conteiner/consola.jfif" alt="" id="imagenActiva">
                <button class="btnCerrar">X</button>
                <!-- <button class="btnAtras">&Lt;</button>
                <button class="btnAdelante">&GT;</button> -->
            </div>
        </div>
        <script src="/exchangecity/PROYECTOSENA/js/descricion.js"></script>
    </section>
    </div>
    <section>
     <img src="" alt="">
     <?php include_once "/wamp64/www/Exchangecity/proyectoSena/Includes/acount.php" ?>
    </section>
  </section>
  <!--limpiamos los flotados del aside -->
  <div style="clear: both"></div>
 

<?php
include_once "/wamp64/www/exchangecity/proyectoSena/Includes/footer.php";
?>

