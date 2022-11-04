<?php 
include_once "/wamp64/www/Exchangecity/proyectoSena/funciones/conexionDB.php";
include_once "/wamp64/www/exchangecity/proyectoSena/Includes/header.php";
include_once "/wamp64/www/exchangecity/proyectoSena/Includes/menulateral.php";

?>

<section id="container">
    <div class="titulo">
        <h1>Verificacion Usuario</h1>
    </div>
<section>
    <form class="verificadoForm login"   action="/exchangecity/proyectoSena/backend/verificacion.php"  enctype="multipart/form-data" method="POST" >
        <label for="imagenCedula">Imagen de la cedula</label>
        <input class="inputVerificado inputLogin" type="file" name="imagenCedula">
        <label for="imagenDireccion">Imagen para comprovar dirrecion</label>
        <input class="inputVerificado inputLogin" type="file" name="imagenDireccion">
        <input class="botonVerificar  buttomProducto " type="submit" value="Enviar">
    </form>
    <?php include_once "/wamp64/www/Exchangecity/proyectoSena/Includes/acount.php" ?>
</section>
</section>










<?php 
  include_once "/wamp64/www/exchangecity/proyectoSena/Includes/footer.php"
  
  ?>