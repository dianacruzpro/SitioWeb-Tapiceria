<?php
  session_start();
  if($_POST){
    if(($_POST['usuario']=="Diana Cruz")&&($_POST['contra']=="tCruz08")){

      $_SESSION['usuario']="ok";
      $_SESSION['nombreUsuario']="Diana Cruz";
      header('Location:inicio.php');
    }else{
      $mensaje="Error: El usuario o contraseña son incorrectos";
    }
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/reset.css">
  <link rel="stylesheet" href="./css/styles.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
  <title>Inicio de seción Administrador</title>
</head>
<body>
  <div class="contenedor__login">
    <img src="./img/wave.svg" class="wave">
    <div class="container">
      <div class="login__img">
        <img src="./img/portada-login.svg">
      </div>
      <div class="login__container">
        <form class="login__form" method="post">
          <img class="login__avatar" src="./img/avatar.svg">
          <h2 class="login__h2">Bienvenido</h2>
          <?php if(isset($mensaje)){?>
              <div class="error__message">
                <p class="error__message-p">
                  <?php echo $mensaje; ?>
                </p>
              </div>
            <?php }?>
          <div class="input__div">
            <div class="input__div-item icon">
              <i class="i fa-solid fa-user"></i>
            </div>
            <div class="input__div-item">
              <h5>Nombre de Usuario</h5>
              <input class="input" type="text" name="usuario" required>
            </div>
          </div>
          <div class="input__div">
            <div class="input__div-item icon">
              <i class="i fa-solid fa-lock"></i>
            </div>
            <div class="input__div-item">
              <h5>Contraseña</h5>
              <input class="input" type="password" name="contra" required>
            </div>
          </div>
          <input type="submit" class="btn" value="Entrar al administrador">
        </form>
      </div>
    </div>
  </div>

  <script src="./js/login.js"></script>
</body>
</html>