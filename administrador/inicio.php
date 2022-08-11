<?php 
  include("./template-admin/cabecera.php"); 
?>

<div class="home__admin">
  <h1 class="home__h1">ADMINISTRADOR</h1>
  <h2 class="home__h2">Tapicería Cruz</h2>
  <p class="home__p"><span class="home__usuario">Bienvenid@ <?php echo $nombreUsuario?>!!</span>
  <br> Manten tu sitio web actualizado para un mejor experiencia.</p>
  <a class="home__a" href="<?php echo $url; ?>/administrador/adm-trabajos.php">Administrar trabajos</a>
</div>


<?php include("./template-admin/pie.php") ?>