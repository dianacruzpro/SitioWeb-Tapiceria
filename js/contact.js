/** Intercambiando la clase focus de los elementos en el formulario */

const inputs = document.querySelectorAll('.input');

function focusFunc(){
  let parent = this.parentNode;
  parent.classList.add("focus");
}

function blurFunc(){
  let parent = this.parentNode;
  if(this.value == ""){
    parent.classList.remove("focus");
  }
}

inputs.forEach((input) =>{
  input.addEventListener("focus", focusFunc);
  input.addEventListener("blur", blurFunc);
})

/**Dando el evento listener al boton de formulario */

const btn = document.getElementById('button');

document.getElementById('form')
 .addEventListener('submit', function(event) {
   event.preventDefault();

   btn.value = 'Enviando...';

   const serviceID = 'default_service';
   const templateID = 'template_9br5rhi';

   emailjs.sendForm(serviceID, templateID, this)
    .then(() => {
      btn.value = 'Enviar mensaje';
      Swal.fire(
        'Excelente!',
        'Mensaje enviado correctamente',
        'success'
      )
    }, (err) => {
      btn.value = 'Enviar mensaje';
      alert(JSON.stringify(err));
    });
});
