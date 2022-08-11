<?php include("template/cabecera-trabajos.php") ?>
<?php 
  include("administrador/config/bd.php");

  $sentenciaSQL=$conexion->prepare("SELECT * FROM products  ORDER BY id_product DESC");
  $sentenciaSQL->execute();
  $listaTrabajos = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="cabecera">
    <form action="trabajos.php">
      <input type="text" class="form barra-busqueda" id="barra-busqueda" placeholder="Buscar">
    </form>

    <div class="categorias" id="categorias">
      <a href="#" class="activo">Todos</a>
      <a href="#">Vehículo</a>
      <a href="#">Hogar</a>
      <a href="#">Oficina</a>
    </div>
</div>

  <section class="grid" id="grid">
    <?php foreach($listaTrabajos as $trabajo){ ?>
      <div class="item" 
            data-categoria="<?php echo $trabajo['category_product']; ?>" 
            data-etiquetas="<?php echo $trabajo['label__product']; ?>"
            data-descripcion="<?php echo $trabajo['description_product']; ?>">
        <div class="item-contenido">
          <img src="img/trabajos/<?php echo $trabajo['img_despues']; ?>" alt="<?php echo $trabajo['name_product']; ?>" title="<?php echo $trabajo['name_product']; ?>" class="work__button work__img img-despues">
          <img src="img/trabajos/<?php echo $trabajo['img_antes']; ?>" alt="<?php echo $trabajo['name_product']; ?>" title="<?php echo $trabajo['name_product']; ?>" class="img-antes">
        </div>
      </div>
    <?php } ?>
  </section>

<?php include("template/pie-trabajos.php") ?>