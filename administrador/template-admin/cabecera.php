<?php
  session_start();
  if(!isset($_SESSION['usuario'])){
    header('Location:../index.php');
  }else{
    if($_SESSION['usuario']=="ok"){
      $nombreUsuario=$_SESSION["nombreUsuario"];
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="./img/logo.png">
  <link rel="apple-touch-icon" href="./img/logo2.png">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;1,100&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
  <link rel="stylesheet" href="./css/styles.css">
  <link rel="stylesheet" href="./css/estilos-nav-adm.css">
  <title>Administrador Tapicería Vásquez</title>
</head>
<body>
  
  <?php $url="http://".$_SERVER['HTTP_HOST'];?>
  <header class="header">
    <div class="contenedor div">
      <a class="a" href="inicio.php">
        <div class="img"></div>
      </a>
      <button class="button">
        <i class="fa-solid fa-bars-staggered i"></i>
      </button>
      <nav class="nav2">
        <ul class="ul">
          <li class="li"><a class="a" href="<?php echo $url; ?>/administrador/inicio.php">Inicio</a></li>
          <li class="li"><a class="a" href="<?php echo $url; ?>/administrador/adm-trabajos.php">Trabajos</a></li>
          <li class="li"><a class="a" href="<?php echo $url; ?>/index.php">Sitio Web</a></li>
          <li class="li"><a class="a" href="<?php echo $url; ?>/administrador/cerrar.php">Cerrar Sesión</a></li>
        </ul>
      </nav>
    </div>
  </header>