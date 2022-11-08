<?php
include_once "/app/funciones/conexionDB.php";
include_once "/app/Includes/header.php";
include_once "/app/Includes/menulateral.php";
include_once "/app/funciones/masFunciones.php";
?>
  <!--contenido de la pagina o aside-->

  <section id="container">
    <div class="titulo">
        <h1>Perfil de los datos</h1>
    </div>
    <section >
    <form class="formDatos"  action="/backend/datosActualizar.php"  enctype="multipart/form-data" method="POST">
      <div class="datosConjunto">
          <div class="datos">
              <div class="datoImagen">
                  <img src="data:image/JPG;base64,<?php echo base64_encode($_SESSION["login_correcto"]["usu_img_perfil"]);?>" /> 
                  <?php echo isset($_SESSION["imagen_correcta"]) ? "<div>".$_SESSION["imagen_correcta"]."</div>":"";?>
                  <?php echo isset($_SESSION["imagen_fallo"]) ? "<div>".$_SESSION["imagen_fallo"]."</div>":"";?>
                  <input type="file" placeholder="Foto de perfil" name="imagenPerfil">
                  <textarea class="datosDes" name="descripcion" ><?php echo $_SESSION["login_correcto"]["usu_descripcion"]?></textarea>
                  
              </div>      
              <div class="datosGenerales">  
              <?php echo isset($_SESSION["actualizacion_correcta"]) ? "<div>".$_SESSION["actualizacion_correcta"]."</div>":"";?>
              <?php echo isset($_SESSION["actualizacion_fallo"]) ? "<div>".$_SESSION["actualizacion_fallo"]."</div>":"";?>
                <div class="datosPersonales">
                  <h1>Datos personales</h1>
                  <label class="labelDatos datosPreguntas" for="nombre">Nombres:</label>
                  <input class="inputDatos inputLogin" name="nombre"  value="<?php echo $_SESSION["login_correcto"]["usu_nombre"] ?>"></input>
                  <label class="labelDatos  datosPreguntas" for="apellido">Apellidos:</label>
                  <input class="inputDatos inputLogin" name="apellido" value="<?php echo $_SESSION["login_correcto"]["usu_apellido"] ?>"></input>
                  <label class="labelDatos  datosPreguntas" for="correo">Correo Electronico</label>
                  <input class="inputDatos inputLogin" name="correo" value="<?php echo $_SESSION["login_correcto"]["usu_correo"] ?>"></input>
                  <label class="labelDatos  datosPreguntas" for="documento">Documento</label>
                  <input class="inputDatos inputLogin" name="documento" value="<?php echo $_SESSION["login_correcto"]["usu_documento"] ?>"></input>

                </div>  
                <div class="datosPagina">
                  <h1>historial de la pagina</h1>
                  <label class="labelDatos  datosPreguntas">transacciones realizadas:</label>
                  <input class="inputDatos inputLogin" disabled="diseabled" value="5 transacciones realizadas"></input>
                  <label class="labelDatos  datosPreguntas">No Verificado/Verificado</label>
                  <?php $datosVerificados= ConsultarVerificados($db,$_SESSION["login_correcto"]["usu_codigo"]);
                            $datosVerificado=mysqli_fetch_assoc($datosVerificados);           
                  ?>
                  <div>
                  <input class="inputDatosVer inputLogin" type="text" disabled="disabled" value="<?php if(isset ($datosVerificado)){
                    echo "VERIFICADO";
                  }else{
                    echo "NO VERIFICADO";
                  } 
                  ?>" >
                  </div>
                  
                </div>
                <div class="datosContacto">
                  <h1>Datos contacto</h1>
                  <label class="labelDatos  datosPreguntas" for="ciudad">Ubicacion</label>
                  <!-- funcion creada para consultar la ciudades y sus opciones -->
                  <?php $ciudades=ConsultarCiudades($db); ?> 
                  <select class="inputDatos inputLogin" name="ciudad" value="<?php $_SESSION["login_correcto"]["FK_ciu_codigo_uc"]?>" >   
                  <?php while($ciudad=mysqli_fetch_assoc($ciudades)): ?>
                    <?php if($_SESSION["login_correcto"]["FK_ciu_codigo_uc"]==$ciudad["ciu_codigo"]):?>
                            <option selected="selected"  value="<?php $_SESSION["login_correcto"]["FK_ciu_codigo_uc"]?>"><?php echo  $ciudad["ciu_nombre"] ?></option>
                            <?php else:?>
                            <option ><?php echo $ciudad["ciu_nombre"]?></option> 
                    <?php endif; ?>    
                  <?php endwhile;?>               
                  </select>
                  <?php echo isset($_SESSION["tipo_correcto"]) ? "<div>".$_SESSION["tipo_correcto"]."</div>":"";?>
                  <?php echo isset($_SESSION["tipo_fallo"]) ? "<div>".$_SESSION["tipo_fallo"]."</div>":"";?>
                  <label class="labelDatos  datosPreguntas" name="contacto" >whatsapp</label>  
                  <input class="inputDatos inputLogin" type="text" name="contacto" value="<?php echo $_SESSION["login_correcto"]["usu_contacto"] ?>"> 
                  <label class="labelDatos  datosPreguntas" for="redSocial" >red social</label> 
                  <input class="inputDatos inputLogin" type="text" name="redSocial" value="<?php echo $_SESSION["login_correcto"]["usu_red_social"] ?>">
                  
                </div>
                <div class="actualizarDatos">
                      <input class="actualizarDatos" type="submit" value="Actualizar"> 
                      <a class="botonVer actualizarDatos"  href="/Includes/verificacion.php">Validar</a>   
                      <a class="botonVer actualizarDatos"  href="/Includes/eliminarCuenta.php?usu_codigo=<?php echo $_SESSION["login_correcto"]["usu_codigo"]?>">Eliminar Cuenta</a>        
                </div>      
          </div>
      </div>
    </form>
    <?php include_once "/app/Includes/acount.php" ?>
    </section>
  </section>
  <?php
  include_once "/app/Includes/footer.php";
  ?>
  <!--limpiamos los flotados del aside -->
  <div style="clear: both"></div>

  <?php unset($_SESSION["imagen_correcta"]);
   unset($_SESSION["imagen_fallo"]);
   unset($_SESSION["actualizacion_correcta"]);
   unset($_SESSION["actualizacion_fallo"]);
   unset($_SESSION["tipo_correcto"]);
   unset($_SESSION["tipo_fallo"]) ;?>
 
