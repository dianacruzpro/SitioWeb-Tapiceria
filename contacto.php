<?php include("template/cabecera.php") ?>

<div class="seccion__contacto">
  <span class="big-circle"></span>
  <span class="big-circle2"></span>
  <div class="form__content">
    <div class="contacto-info">
      <h3 class="title title-info">
        Vamos a ponernos en contacto
      </h3>
      <p class="text">
        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Rem praesentium perspiciatis illum, commodi molestiae voluptatum.
      </p>
      <div class="info">
        <div class="informacion">
          <i class="fa-solid fa-map-location"></i>
          <p>Esta es la direccion</p>
        </div>
        <div class="informacion">
          <i class="fa-solid fa-envelope"></i>
          <p>info@tapiceriacruz.com</p>
        </div>
        <div class="informacion">
          <i class="fa-solid fa-phone"></i>
          <p>1234-5678</p>
        </div>
        <div class="social-media">
          <p>Siguenos en</p>
          <div class="social-icons">
            <a href="#">
            <i class="fa-brands fa-facebook"></i>
            </a>
            <a href="#">
            <i class="fa-brands fa-twitter"></i>
            </a>
            <a href="#">
            <i class="fa-brands fa-instagram"></i>
            </a>
          </div>
        </div>
      </div>
    </div>

    <div class="contacto-form">
      <span class="circle circle-one"></span>
      <span class="circle circle-two"></span>

      <form action="contacto.php" class="form-contact" id="form">
        <h3 class="title">Contactanos</h3>
        <div class="input-container">
          <input type="text" name="name" class="input" required>
          <label class="label">Nombre completo</label>
          <span class="span-label">Nombre completo</span>
        </div>
        <div class="input-container">
          <input type="email" name="email" class="input" required>
          <label class="label">Correo</label>
          <span class="span-label">Correo</span>
        </div>
        <div class="input-container">
          <input type="tel" name="phone" class="input" required>
          <label class="label">Teléfono</label>
          <span class="span-label">Teléfono</span>
        </div>
        <div class="input-container">
          <textarea name="message" class="input textarea" required></textarea>
          <label class="label label-textarea">Mensaje</label>
          <span class="span-label">Mensaje</span>
        </div>
        <input type="submit" class="boton-enviar" value="Enviar mensaje" id="button">
      </form>
      <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/@emailjs/browser@3/dist/email.min.js"></script>
      <script type="text/javascript">emailjs.init('0kCl_q1-1AQFY__Vm')
</script>
    </div>
  </div>
</div>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="./js/contact.js"></script>
<?php include("template/pie.php") ?>