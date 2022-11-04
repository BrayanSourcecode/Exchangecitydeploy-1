<?php 
include_once "/wamp64/www/Exchangecity/proyectoSena/funciones/conexionDB.php";
include_once "/wamp64/www/exchangecity/proyectoSena/Includes/header.php";
include_once "/wamp64/www/exchangecity/proyectoSena/Includes/menulateral.php";

?>
 

 <!--contenido de la pagina o aside-->
  <section id="container">
    
  <form class="login" action="/exchangecity/PROYECTOSENA/backend/login.php" method="post">
       <h3>Iniciar Seccion</h3> 
       <label class="labelLogin" for="correo">Correo</label>
       <input  class="inputLogin" type="email" name="correo">
       <?php echo isset($_SESSION["correo_erroneo"])  ? "<div>" . $_SESSION["correo_erroneo"] . "</div>":"";    ?>
       <label class="labelLogin" for="pasword">Contraseña</label>
       <input class="inputLogin" type="password" name="password">
       <?php echo isset($_SESSION["password_vacia"])  ? "<div>". $_SESSION["password_vacia"] ."</div>":"";  ?>
       <?php echo isset($_SESSION["contrasena_mala"])  ? "<div>". $_SESSION["contrasena_mala"] ."</div>":"";  ?>
     

       <input type="submit" value="Iniciar Secion">
   </form>
  </section>
  <!--limpiamos los flotados del aside -->
  <div style="clear: both"></div>

 
  <?php 
  include_once "/wamp64/www/exchangecity/proyectoSena/Includes/footer.php"
  
  ?>


<?php 

  /*sesiones del login */
      unset($_SESSION["correo_erroneo"]);
      unset($_SESSION["contrasena_mala"]);
      unset($_SESSION["password_vacia"]);
      unset($_SESSION["login_correcto"]);
  ?>