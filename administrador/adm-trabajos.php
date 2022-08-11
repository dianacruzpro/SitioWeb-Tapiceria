<?php include("./template-admin/cabecera.php") ?>
<?php
  include("./config/bd.php");
  
  $txtID = (isset($_POST['txtID']))?$_POST['txtID']:"";
  $txtNombre = (isset($_POST['txtNombre']))?$_POST['txtNombre']:"";
  $txtDescripcion = (isset($_POST['txtDescripcion']))?$_POST['txtDescripcion']:"";
  $txtEtiquetas = (isset($_POST['txtEtiquetas']))?$_POST['txtEtiquetas']:"";
  $txtCategoria = (isset($_POST['txtCategoria']))?$_POST['txtCategoria']:"";

  $txtImgAntes = (isset($_FILES['txtimg-antes']['name']))?$_FILES['txtimg-antes']['name']:"";
  $txtImgDespues = (isset($_FILES['txtimg-despues']['name']))?$_FILES['txtimg-despues']['name']:"";
  
  $accion = (isset($_POST['accion']))?$_POST['accion']:"";

  switch($accion){
    case "Agregar":
      $sentenciaSQL=$conexion->prepare("INSERT INTO products (name_product, description_product, img_antes, img_despues, category_product, label__product) VALUES (:name_product, :description_product, :img_antes, :img_despues, :category_product, :label__product);");

      $fecha = new DateTime();
      $nombreArchivoAntes = ($txtImgAntes!="")?$fecha->getTimestamp()."_".$_FILES['txtimg-antes']['name']:"trabajoAntes.jpg";
      $nombreArchivoDespues = ($txtImgDespues!="")?$fecha->getTimestamp()."_".$_FILES['txtimg-despues']['name']:"trabajoDespues.jpg";

      $tmpTrabajoAntes = $_FILES['txtimg-antes']['tmp_name'];
      $tmpTrabajoDespues = $_FILES['txtimg-despues']['tmp_name'];

      if($tmpTrabajoAntes!=""){
        move_uploaded_file($tmpTrabajoAntes,"../../img/trabajos/".$nombreArchivoAntes);
      }
      if($tmpTrabajoDespues!=""){
        move_uploaded_file($tmpTrabajoDespues,"../../img/trabajos/".$nombreArchivoDespues);
      }

      $sentenciaSQL->bindParam(':name_product',$txtNombre);
      $sentenciaSQL->bindParam(':description_product',$txtDescripcion);
      $sentenciaSQL->bindParam(':img_antes',$nombreArchivoAntes);
      $sentenciaSQL->bindParam(':img_despues',$nombreArchivoDespues);
      $sentenciaSQL->bindParam(':category_product',$txtCategoria);
      $sentenciaSQL->bindParam(':label__product',$txtEtiquetas);
      $sentenciaSQL->execute();
      header("Location:adm-trabajos.php");
    break;
    case "Modificar":
      $sentenciaSQL=$conexion->prepare("UPDATE products SET name_product=:name_product,description_product=:description_product,category_product=:category_product,label__product=:label__product WHERE id_product=:id_product;");
      $sentenciaSQL->bindParam(':id_product',$txtID);
      $sentenciaSQL->bindParam(':name_product',$txtNombre);
      $sentenciaSQL->bindParam(':description_product',$txtDescripcion);
      $sentenciaSQL->bindParam(':category_product',$txtCategoria);
      $sentenciaSQL->bindParam(':label__product',$txtEtiquetas);
      $sentenciaSQL->execute();

      if($txtImgAntes!=""){
        $fecha = new DateTime();
        $nombreArchivoAntes = ($txtImgAntes!="")?$fecha->getTimestamp()."_".$_FILES['txtimg-antes']['name']:"trabajoAntes.jpg";
  
        $tmpTrabajoAntes = $_FILES['txtimg-antes']['tmp_name'];
        move_uploaded_file($tmpTrabajoAntes,"../../img/trabajos/".$nombreArchivoAntes);
       
        $sentenciaSQL=$conexion->prepare("SELECT img_antes FROM products WHERE id_product=:id_product");
        $sentenciaSQL->bindParam(':id_product',$txtID);
        $sentenciaSQL->execute();
        $trabajo = $sentenciaSQL->fetch(PDO::FETCH_LAZY);
  
        if(isset($trabajo['img_antes']) && ($trabajo['img_antes']!="trabajoAntes.jpg")){
          if(file_exists("../../img/trabajos/".$trabajo['img_antes'])){
            unlink("../../img/trabajos/".$trabajo['img_antes']);
          }
        }
  
        $sentenciaSQL=$conexion->prepare("UPDATE products SET img_antes=:img_antes WHERE id_product=:id_product;");
        $sentenciaSQL->bindParam(':id_product',$txtID);
        $sentenciaSQL->bindParam(':img_antes',$txtImgAntes);
        $sentenciaSQL->execute();
      }
      if($txtImgDespues!=""){
        $fecha = new DateTime();
        $nombreArchivoDespues = ($txtImgDespues!="")?$fecha->getTimestamp()."_".$_FILES['txtimg-despues']['name']:"trabajoDespues.jpg";

        $tmpTrabajoDespues = $_FILES['txtimg-despues']['tmp_name'];
        move_uploaded_file($tmpTrabajoDespues,"../../img/trabajos/".$nombreArchivoDespues);

        $sentenciaSQL=$conexion->prepare("SELECT img_despues FROM products WHERE id_product=:id_product");
        $sentenciaSQL->bindParam(':id_product',$txtID);
        $sentenciaSQL->execute();
        $trabajo = $sentenciaSQL->fetch(PDO::FETCH_LAZY);
        if(isset($trabajo['img_despues']) && ($trabajo['img_despues']!="trabajoDespues.jpg")){
          if(file_exists("../../img/trabajos/".$trabajo['img_despues'])){
            unlink("../../img/trabajos/".$trabajo['img_despues']);
          }
        }

        $sentenciaSQL=$conexion->prepare("UPDATE products SET img_despues=:img_despues WHERE id_product=:id_product;");
        $sentenciaSQL->bindParam(':id_product',$txtID);
        $sentenciaSQL->bindParam(':img_despues',$txtImgDespues);
        $sentenciaSQL->execute();
      }
      header("Location:adm-trabajos.php");
    break;
    case "Cancelar":
      header("Location:adm-trabajos.php");
    break;
    case "Editar":
      $sentenciaSQL=$conexion->prepare("SELECT * FROM products WHERE id_product=:id_product");
      $sentenciaSQL->bindParam(':id_product',$txtID);
      $sentenciaSQL->execute();
      $trabajo = $sentenciaSQL->fetch(PDO::FETCH_LAZY);

      $txtNombre = $trabajo['name_product'];
      $txtDescripcion = $trabajo['description_product'];
      $txtCategoria = $trabajo['category_product'];
      $txtEtiquetas = $trabajo['label__product'];
      $txtImgAntes = $trabajo['img_antes'];
      $txtImgDespues = $trabajo['img_despues'];
      // echo "boton editar";
    break;
    case "Borrar":
      $sentenciaSQL=$conexion->prepare("SELECT img_antes FROM products WHERE id_product=:id_product");
      $sentenciaSQL->bindParam(':id_product',$txtID);
      $sentenciaSQL->execute();
      $trabajo = $sentenciaSQL->fetch(PDO::FETCH_LAZY);

      if(isset($trabajo['img_antes'])&&($trabajo['img_antes']!="trabajoAntes.jpg")){
        if(file_exists("../../img/trabajos/".$trabajo['img_antes'])){
          unlink("../../img/trabajos/".$trabajo['img_antes']);
        }
      }

      $sentenciaSQL=$conexion->prepare("SELECT img_despues FROM products WHERE id_product=:id_product");
      $sentenciaSQL->bindParam(':id_product',$txtID);
      $sentenciaSQL->execute();
      $trabajo = $sentenciaSQL->fetch(PDO::FETCH_LAZY);
      if(isset($trabajo['img_despues'])&&($trabajo['img_despues']!="trabajoDespues.jpg")){
        if(file_exists("../../img/trabajos/".$trabajo['img_despues'])){
          unlink("../../img/trabajos/".$trabajo['img_despues']);
        }
      }


      $sentenciaSQL=$conexion->prepare("DELETE FROM products WHERE id_product=:id_product");
      $sentenciaSQL->bindParam(':id_product',$txtID);
      $sentenciaSQL->execute();
      header("Location:adm-trabajos.php");
    break;
  }

  $sentenciaSQL=$conexion->prepare("SELECT * FROM products ORDER BY id_product DESC");
  $sentenciaSQL->execute();
  $listaTrabajos = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="contenedor">
  <h1 class="trabajos__h1">DATOS NUEVO TRABAJO</h1>
  <form class="form__trabajos" method="post" enctype="multipart/form-data">
    <div class="column col__1">
      <div class="input__item">
        <label class="label" for="">ID</label>
        <input class="form-control input__trabajo" type="text" value="<?php echo $txtID; ?>" name="txtID" disabled>
      </div>
      <div class="input__item">
        <label class="label" for="">Nombre</label>
        <input class="form-control input__trabajo" type="text" value="<?php echo $txtNombre; ?>" name="txtNombre" required>
      </div>
      <div class="input__item">
        <label class="label" for="">Etiquetas</label>
        <input class="form-control input__trabajo" type="text" value="<?php echo $txtEtiquetas; ?>" name="txtEtiquetas" required>
      </div>
      <div class="input__item">
        <label class="label" for="">Categoría</label>
        <!-- <input class="form-control input__trabajo" type="text" value="<?php echo $txtCategoria ?>" name="txtCategoria" placeholder="Hogar/Oficina/Vehículo" required> -->
        <select class="input__trabajo select" name="txtCategoria" required>
          <option class="option" name="opcion-cat" value="<?php echo $txtCategoria ?>" disabled selected><?php echo $txtCategoria ?></option>
          <option class="option" name="opcion-cat" value="Hogar">hogar</option>
          <option class="option" name="opcion-cat" value="Vehículo">vehículo</option>
          <option class="option" name="opcion-cat" value="Oficina">oficina</option>
        </select>
      </div>
    </div>
    <div class="column col__2">
      <div class="input__item">
        <label class="label" for="">Descripción</label>
        <textarea class="textarea form-control input__trabajo" name="txtDescripcion" required><?php echo $txtDescripcion; ?></textarea>
      </div>
      <div class="input__item">
        <label class="label" for="">Portada Antes</label>
        <div class="div__imgantes">
          <input class="form-control input__trabajo" type="file" accept="image/*" name="txtimg-antes">
          <?php if($txtImgAntes!=""){ ?>
            <img class="img__trabajo" src="../../img/trabajos/<?php echo $txtImgAntes; ?>">
          <?php } ?>
        </div>
      </div>
      <div class="input__item">
        <label class="label" for="">Portada Despues</label>
        <div class="div__imgdespues">
          <input class="form-control input__trabajo" type="file" accept="image/*" name="txtimg-despues">
          <?php if($txtImgDespues!=""){ ?>
            <img class="img__trabajo" src="../../img/trabajos/<?php echo $txtImgDespues;?>">
          <?php } ?>
          
        </div>
      </div>
    </div>
    <div class="btns__group">
      <input class="btn btn__trabajo" name="accion" <?php echo ($accion=="Editar")?"disabled":""; ?> type="submit" value="Agregar">
      <input class="btn btn__trabajo" name="accion" <?php echo ($accion!="Editar")?"disabled":""; ?> type="submit" value="Modificar">
      <input class="btn btn__trabajo" name="accion" <?php echo ($accion!="Editar")?"disabled":""; ?> type="submit" value="Cancelar">
    </div>
  </form>

  <div class="table__container">
    <div class="contenedor__tabla">
      <div class="table__header">
        <h2>Mis trabajos</h2>
      </div>
      <table class="table">
        <thead class="thead">
          <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Categoría</th>
            <th>Etiquetas</th>
            <th>Portada Ántes</th>
            <th>Portada Después</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody class="tbody">
          <?php foreach($listaTrabajos as $work) { ?>
            <tr>
              <td data-label="ID"><strong><?php echo $work['id_product']; ?></strong></td>
              <td data-label="Nombre"><?php echo $work['name_product']; ?></td>
              <td data-label="Descripcion"><?php echo $work['description_product']; ?></td>
              <td data-label="Categoría"><?php echo $work['category_product']; ?></td>
              <td data-label="Etiquetas"><?php echo $work['label__product']; ?></td>
              <td data-label="Portada Antes">
                <img class="img__antes img__trabajo" src="../../img/trabajos/<?php echo $work['img_antes'];?>" alt="$work['name_product'];" title="<?php echo $work['name_product']?> antes">
              </td>
              <td data-label="Portada Despues">
                <img class="img__despues img__trabajo" src="../../img/trabajos/<?php echo $work['img_despues'];?>" alt="$work['name_product'];" title="<?php echo $work['name_product']?> despues">
              </td>
              <td data-label="Acciones">
                <form class="form__acciones" method="post">
                  <input type="hidden" name="txtID" id="txtID" value="<?php echo $work['id_product'];?>">
                  <button class="btn__acciones" name="accion" value="Editar"><i class="fa-solid fa-pen-to-square"></i></button>
                  <button class="btn__acciones" name="accion" value="Borrar"><i class="fa-solid fa-trash"></i></button>
                </form>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
    
  </div>
</div>


<script src="./js/script.js"></script>
<?php include("./template-admin/pie.php") ?>