<?php include("template/cabecera.php") ?>
<?php
session_start();
session_destroy();
?>

<div class="sliders">
  <div class="slider fade" style="display: block;">
    <div class="slider__texto">
      <img class="slider__texto-img" src="img/logoTV2.png" alt="Titulo tapiceria vásquez">
      <p class="slider__texto-p">Tapizado de muebles de sala y oficina.</p>
    </div>
    <div class="slider__capa"></div>
    <img class="slider__img" src="img/inicio/portada1.jpg" alt="Tapizado de muebles de sala y oficina" title="Tapizado de muebles de sala y oficina.">
  </div>
  <div class="slider fade">
    <div class="slider__texto">
      <img class="slider__texto-img" src="img/logoTV2.png" alt="Titulo tapiceria vásquez">
      <p class="slider__texto-p">Tapizado completo de autos.</p>
    </div>
    <div class="slider__capa"></div>
    <img class="slider__img" src="img/inicio/inicio-trabajo2.jpg" alt="Tapizado completo de autos" title="Tapizado completo de autos.">
  </div>
  <div class="slider fade">
    <div class="slider__texto">
      <img class="slider__texto-img" src="img/logoTV2.png" alt="Titulo tapiceria vásquez"> 
      <p class="slider__texto-p">Tapizado de motos.</p>
    </div>
    <div class="slider__capa"></div>
    <img class="slider__img" src="img/inicio/portada2.jpg" alt="Tapizado de motos" title="Tapizado de motos.">
  </div>
  <a class="prev" onclick="plusSlider(-1)"><i class="fa-solid fa-angle-left"></i></a>
  <a class="next" onclick="plusSlider(1)"><i class="fa-solid fa-angle-right"></i></a>

  <div class="dotsbox">
    <span class="dot" onclick="currentSlider(1)"></span>
    <span class="dot" onclick="currentSlider(2)"></span>
    <span class="dot" onclick="currentSlider(3)"></span>
  </div>
</div>

<div class="contenedor contenedor__trabajos">
  <div class="trabajos">
    <h1 class="trabajos__texto--h1">Algunos de nuestros trabajos</h1>
    <h2 class="trabajos__texto--h2">Interior de automóviles</h2>
  </div>
  <div class="contenedor__images">
    <div class="panel" style="background-image:url('img/inicio/inicio-trabajo1.jpg');">
      <h3 class="panel__h3">Tapicería de puertas</h3>
    </div>
    <div class="panel panel-activo" style="background-image:url('img/inicio/inicio-trabajo2.jpg');">
      <h3 class="panel__h3">Tapicería de interiores</h3>
    </div>
    <div class="panel" style="background-image:url('img/inicio/inicio-trabajo3.jpg');">
      <h3 class="panel__h3">Tapicería de volantes</h3>
    </div>
    <div class="panel" style="background-image:url('img/inicio/inicio-trabajo4.jpg');">
      <h3 class="panel__h3">Tapicería de interiores</h3>
    </div>
  </div>
  <div class="trabajos">
    <h2 class="trabajos__texto--h2">Muebles de sala y oficina</h2>
  </div>
  <div class="contenedor__images">
    <div class="panel2" style="background-image:url('img/inicio/inicio-mueble1.jpeg');">
      <h3 class="panel2__h3">Mueble de oficina retapizado</h3>
    </div>
    <div class="panel2" style="background-image:url('img/inicio/inicio-mueble2.jpeg');">
      <h3 class="panel2__h3">Retapizado de juego de muebles</h3>
    </div>
    <div class="panel2" style="background-image:url('img/inicio/inicio-mueble3.jpeg');">
      <h3 class="panel2__h3">Mueble de sala retapizado</h3>
    </div>
    <div class="panel2 panel2-activo" style="background-image:url('img/inicio/inicio-mueble4.jpeg');">
      <h3 class="panel2__h3">Tapizado de juego de muebles</h3>
    </div>
  </div>
  <div class="trabajos">
    <h2 class="trabajos__texto--h2">Asientos y alforjas para motocicletas</h2>
  </div>
  <div class="contenedor__images">
    <div class="panel3 panel3-activo" style="background-image:url('img/inicio/inicio-moto1.jpg');">
      <h3 class="panel3__h3">Asiento de motocicleta estilo personalizado</h3>
    </div>
    <div class="panel3" style="background-image:url('img/inicio/inicio-moto2.jpg');">
      <h3 class="panel3__h3">Tapizado de asiento y alforjas de cuero e impermeable</h3>
    </div>
    <div class="panel3" style="background-image:url('img/inicio/tapizado2.jpg');">
      <h3 class="panel3__h3">Retapizado de asiento y creación de alforja</h3>
    </div>
    <div class="panel3" style="background-image:url('img/inicio/inicio-moto4.jpg');">
      <h3 class="panel3__h3">Retapizado de asiento</h3>
    </div>
  </div> 
  <a class="btn" href="trabajos.php">Ver mas</a>
</div>

  <div class="contenedor">
    <div class="services__text">
      <h1 class="services__text--h1">Algunos de nuestros servicios</h1>
    </div>

    <div class="cards__container">
      <div class="cards">
        <div class="card">
          <div class="title">
            <i class="fas fa-solid fa-car-side"></i>
            <h2>Vehículos</h2>
          </div>
          <div class="text">
            <p>Tapizamos los interiores, techos y capotas de vehículos de forma rigurosa,respetando las especificaciones y diseño del cliente.</p>
          </div>
        </div>
        <div class="card">
          <div class="title">
            <i class="fas fa-solid fa-motorcycle"></i>
            <h2>Motocicletas</h2>
          </div>
          <div class="text">
            <p>Retapizamos asientos y creamos modernas alforjas para motocicletas,que son una excelente opción para guardar todo lo que necesite llevar a diario o en un viaje y en un solo lugar.</p>
          </div>
        </div>
        <div class="card">
          <div class="title">
            <i class="fas fa-solid fa-couch"></i>
            <h2>Muebles</h2>
          </div>
          <div class="text">
            <p>Nos encargamos de todo el proceso para el tapizado y retapizado del mueble,asesorando al cliente en todo lo que sea posible, para conseguir materializar tu idea.</p>
          </div>
        </div>
        <div class="card">
          <div class="title">
            <i class="fas fa-solid fa-scissors"></i>
            <h2>Estilos</h2>
          </div>
          <div class="text">
            <p>Realizamos tapizado general tanto en estilo clásico como en un estilo moderno,para conseguir un ambiente agradable y bien combinado en el hogar.</p>
          </div>
        </div>
      </div>
      <a class="btn" href="servicios.php">Ver mas</a>
    </div>
  </div>


<script src="./js/app2.js"></script>
<?php include("template/pie.php") ?>