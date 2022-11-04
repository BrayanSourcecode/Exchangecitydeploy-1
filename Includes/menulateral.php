<!-- Menu lateral -->
<nav id="menu">
    <div class="icono">
      <a class="menuObjeto" href="/exchangecity/PROYECTOSENA/index.php">
        <img class="menuIcono" src="/exchangecity/PROYECTOSENA/imagenes/Navegacion/svg/house.svg" alt="inicio.svg">
        <span>Inicio</span>
      </a>
    </div>
    <div class="icono">
      <a class="menuObjeto" href="/exchangecity/proyectoSena/Includes/categorias.php?tipo=TV">
        <img class="menuIcono" src="/exchangecity/PROYECTOSENA/imagenes/Navegacion/svg/tv.svg" alt="televisores.svg">
        <span>TV</span>
      </a>
    </div>
    <div class="icono">
      <a class="menuObjeto" href="/exchangecity/proyectoSena/Includes/categorias.php?tipo=Movil">
        <img class="menuIcono" src="/exchangecity//PROYECTOSENA/imagenes/Navegacion/svg/smartphone.svg" alt="movil.svg">
        <span>Movil</span>
      </a>
    </div>
    <div class="icono">
      <a class="menuObjeto" href="/exchangecity/proyectoSena/Includes/categorias.php?tipo=Pc">
        <img class="menuIcono" src="/exchangecity//PROYECTOSENA/imagenes/Navegacion/svg/pc.svg" alt="computadoras.svg">
        <span>PC</span>
      </a>
    </div>
    <div class="icono">
      <a class="menuObjeto" href="/exchangecity/proyectoSena/Includes/categorias.php?tipo=Consolas">
        <img class="menuIcono" src="/exchangecity//PROYECTOSENA/imagenes/Navegacion/svg/console-controller.svg" alt="consolas.svg">
        <span> Consolas</span>
      </a>
    
    </div>   
    <?php if(isset($_SESSION["login_correcto"])):  ?>
    <div class="acount_button icono">
      <button class="bottom menuObjeto"><img class="menuIcono" src="/Exchangecity\proyectoSena\imagenes\navegacion\people_outline_white_24dp.svg" alt="">
      </button>
    </div>
     <?php endif?>
  </nav>