<div class="navbar">
  <div class="d-flex justify-content-between">
    
    <div class="navbar-header ml-auto">
      <a href="index.php?pag=principal" class="navbar-brand mx-auto"><img class="img img-responsive" src="plugins/img/palantelogo.png"></a>
    </div>

    <div class="search mx-auto">
      <i class="ionicons ion-ios-search-strong"></i>
        <input type="search" border="" name="caja_busqueda" id="caja_busqueda" placeholder="Busque eventos" class="searchinput">
        <div class="datos"></div>
    </div>   

    <a href='index.php?evento=index' class="nav-link ml-auto"> Catálogo </a>

    <div class='dropdown'>
      <a class='nav-link dropdown-toggle' data-toggle='dropdown'>Categorías</a>
      <ul class='dropdown-menu'>
            <li><a href='index.php?categoria=index#1'>Musica</a></li>
            <li><a href='index.php?categoria=index#2'>Deporte</a></li>
            <li><a href='index.php?categoria=index#3'>Gastronomía</a></li>
            <li><a href='index.php?categoria=index#4'>Sociales</a></li>
            <li><a href='index.php?categoria=index#5'>Tecnologia</a></li>
            <li><a href='index.php?categoria=index#6'>Arte</a></li>
            <li><a href='index.php?categoria=index#7'>Trabajo Social</a></li>
            <li><a href='index.php?categoria=index#8'>Espiritualidad</a></li>
            <li><a href='index.php?categoria=index#9'>Excursión</a></li>
      </ul>
    </div> 
      
    <?php 
            session_start();
            if ( $_SESSION['autentificado'] == true ){ 
              echo 
                "<div class='dropdown'>
                  <a class='nav-link dropdown-toggle' data-toggle='dropdown'>".$_SESSION['nombre']."</a>
                  <ul class='dropdown-menu'>
                        <li><a href='index.php?user=editar'>Mi cuenta</a></li>
                        <li><a href='index.php?org=registrar'>Crea una organización</a></li>
                        <li><a href='modelos/sesion/salir.php'>Cerrar sesión</a></li>
                  </ul>
                </div> 
          
                <a href='index.php?evento=registrar' class='nav-link'> Crear evento </a>";
        } else {
              echo
                "<a href='index.php?user=registrar' class='nav-link'> Regístrate </a>
                <a href='index.php?sesion=login' class='nav-link'> Iniciar sesión </a>
                <a href='index.php?sesion=login' class='nav-link'> Crear evento </a>"; }
    ?>
      
    
  </div>
</div>
