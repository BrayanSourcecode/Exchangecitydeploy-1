<?php 
include_once "/app/funciones/conexionDB.php";
include_once "/app/Includes/header.php";
include_once "/app/Includes/menulateral.php";

?>

<section id="container">
    <div class="titulo">
        <h1>Verificacion Usuario</h1>
    </div>
<section>
    <form class="verificadoForm login"   action="/backend/verificacion.php"  enctype="multipart/form-data" method="POST" >
        <label for="imagenCedula">Imagen de la cedula</label>
        <input class="inputVerificado inputLogin" type="file" name="imagenCedula">
        <label for="imagenDireccion">Imagen para comprovar dirrecion</label>
        <input class="inputVerificado inputLogin" type="file" name="imagenDireccion">
        <input class="botonVerificar  buttomProducto " type="submit" value="Enviar">
    </form>
    <?php include_once "/app/Includes/acount.php" ?>
</section>
</section>










<?php 
  include_once "/app/Includes/footer.php"
  
  ?>
