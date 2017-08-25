<link href="vistas/principal/assets/css/main.css" rel="stylesheet">

<input type="hidden" name="pag" value="principal">

<div data-spy="scroll" data-offset="0" data-target="#navbar-main">

<?php @include('vistas/principal/header/header.php') ?>


<!-- barra buscador -->
<?php @include('vistas/principal/contenido/barrabuscador.php') ?>

<!-- modals de categoria, debe realizar filtro por categoria al presionar boton -->
<?php @include('vistas/principal/modals/modalcategoria.php') ?>

<?php @include('vistas/principal/contenido/contenido.php') ?>

<!--Barra buscador de Eventos, debe filtrar los eventos por nombre en el boton -->


<!-- Contenido -->
<?php @include('vistas/principal/contenido/contenido2.php') ?>


<!-- pie de la pagina -->



</div>
</html>