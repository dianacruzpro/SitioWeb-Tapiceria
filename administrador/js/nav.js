/** Cuando se hace click en .button, .nav toglgle 'activo'  */

const button = document.querySelector('.button');
const nav2 = document.querySelector('.nav2');

button.addEventListener('click' , () =>{
  nav2.classList.toggle('activo');
})