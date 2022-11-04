<?php 
include_once "/wamp64/www/Exchangecity/proyectoSena/funciones/conexionDB.php";
include_once "/wamp64/www/exchangecity/proyectoSena/Includes/header.php";
include_once "/wamp64/www/exchangecity/proyectoSena/Includes/menulateral.php";
include_once "/wamp64/www/Exchangecity/proyectoSena/funciones/masFunciones.php";

?>
 

 <!--contenido de la pagina o aside-->
  <section id="container">
    <div class="titulo">
      <h1>Editar Publicacion</h1>
    </div>
    <section>
        <?php $detallesPublicacion=ConsultarDescripcionPublicacion($db,$_REQUEST["pub_codigo"]);
            $infoPublicacion=mysqli_fetch_assoc($detallesPublicacion);
        ?>
    <form class="publicarProductos" action="/exchangecity/PROYECTOSENA/backend/publicacionEditar.php?pub_codigo=<?php echo $_REQUEST["pub_codigo"];?>" enctype="multipart/form-data" method="POST">
                <label for="tituloPublicacion">titulo</label>
                <input  class="inputPublicar inputLogin" type="text" name="tituloPublicacion" value="<?php echo $infoPublicacion["pub_titulo"] ?>">
                <label for="idPub">Id De La Publicaion</label>
                <input  class="inputPublicar inputLogin" type="text" name="idPub" readonly value="<?php echo $infoPublicacion["pub_codigo"] ?>">
                <label for="descripcion">Descripcion de la Publicacion</label>
                <textarea class="inputPublicar inputLogin" name="descripcion" ><?php echo $infoPublicacion["pub_descripcion"]?></textarea>
                <label for="intereses">intereses de intercambio</label>
                <textarea class="inputPublicar inputLogin" name="intereses"><?php echo $infoPublicacion["pub_intereses"]?></textarea>
                <?php $categorias=ConsultarCategoria($db) ?>
                <label for="categoriaId">Categorias</label>

                <?php $categorias_editar= ConsultarCategoria($db);?>
                <select name="categoriaId">
                <?php while($categoria=mysqli_fetch_assoc($categorias_editar)) :?>
                    <?php if($categoria["cat_codigo"]==$infoPublicacion["FK_cat_codigo_pc"]):?>
                            <option selected="selected"  value="<?php $categoria["cat_tipo"]?>"><?php echo $categoria["cat_tipo"] ?></option>
                            <?php else:?>
                            <option ><?php echo $categoria["cat_tipo"]?></option> 
                    <?php endif; ?>
                <?php endwhile;?>
                </select>

            
                <label for="estado"> Estado del producto</label>
                <?php $estados_editar=ConsultarEstado($db);
                 ?>

                <select name="estado">
                  <?php while($estado=mysqli_fetch_assoc($estados_editar)):?>
                    <?php if($estado["est_codigo"]==$infoPublicacion["FK_est_codigo_pe"]):?>
                            <option selected="selected"  value="<?php echo $estado["est_nombre"]?>"><?php echo $estado["est_nombre"] ?></option>
                            <?php else:?>
                            <option ><?php echo $estado["est_nombre"]?></option> 
                    <?php endif; ?>
                <?php endwhile;?>
                </select>
                <div class="conten_img_editar">
                <div class="archivo_img">
                    <label class="label"  for="fotoPrincipal">Foto Principal</label>
                    <input class="img inputPublicar inputLogin" type="file" name="fotoPrincipal">
                    <img class="img_editar" src="data:image/JPG;base64,<?php echo base64_encode($infoPublicacion["pub_img_general"]);?>" />
                </div>
                <div class="archivo_img">
                    <label  class="label" for="imagen1">Imagen 1</label>
                    <input class="img inputPublicar inputLogin" type="file" name="imagen1">
                    <img class="img_editar" src="data:image/JPG;base64,<?php echo base64_encode($infoPublicacion["pub_img1"]);?>" />
                </div>
                <div class="archivo_img">
                    <label class="label"  for="imagen2">Imagen 2</label>
                    <input class="img inputPublicar inputLogin" type="file" name="imagen2">
                    <img class="img_editar" src="data:image/JPG;base64,<?php echo base64_encode($infoPublicacion["pub_img2"]);?>" />
                </div>
                <div class="archivo_img">
                    <label class="label"  for="imagen3">Imagen 3</label>
                    <input class="img inputPublicar inputLogin" type="file" name="imagen3">
                    <img class="img_editar" src="data:image/JPG;base64,<?php echo base64_encode($infoPublicacion["pub_img3"]);?>" />
                </div>
                <div class="archivo_img">
                    <label class="img label"  for="imagen4">Imagen 4</label>
                    <input class="img inputPublicar inputLogin" type="file" name="imagen4">
                    <img class="img_editar" src="data:image/JPG;base64,<?php echo base64_encode($infoPublicacion["pub_img4"]);?>" />
                </div>
            
                </div>
                <div class="enviar_eliminar">
                <input  class="Eliminar" type="submit" value="Actualizar Publicacion">
                <a class="Eliminar" href="/exchangecity/proyectoSena/Includes/eliminarPublicacion.php?pub_codigo=<?php echo $_REQUEST["pub_codigo"] ?>">Eliminar Publicacion</a></>
                </div>
            </form>
  <?php include_once "/wamp64/www/Exchangecity/proyectoSena/Includes/acount.php"?>
    </section>
  </section>

  



  <!--limpiamos los flotados del aside -->
  <div style="clear: both"></div>

 
  <?php 
  include_once "/wamp64/www/exchangecity/proyectoSena/Includes/footer.php"
  ?>