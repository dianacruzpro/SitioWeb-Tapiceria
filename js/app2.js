/** Agregando eventos click al slider del inicio */
const slider = document.querySelectorAll('.slider'),
      dot = document.querySelectorAll('.dot');

let counter = 1;
sliderfun(counter);

let timer = setInterval(autoslider, 6000);
function autoslider(){
  counter += 1;
  sliderfun(counter);
}

function plusSlider(n){
  counter += n;
  sliderfun(counter);
  resetTimer();
}

function currentSlider(n){
  counter = n;
  sliderfun(counter);
  resetTimer();
}

function resetTimer(){
  clearInterval();
}

function sliderfun(n){
  let i;
  for(i = 0; i < slider.length; i++){
    slider[i].style.display = "none";
  }
  for(i = 0; i < dot.length; i++){
    dot[i].classList.remove('activo');
  }
  if(n > slider.length){
    counter = 1;
  }
  if(n<1){
    counter = slider.length;
  }
  slider[counter - 1].style.display = "block";
  dot[counter - 1].classList.add('activo');
}

/** Agregando eventos click para los trabajos del inicio */
const panels = document.querySelectorAll('.panel');
panels.forEach((panel)=>{
  panel.addEventListener('click', ()=>{
    removeActiveClases();
    panel.classList.add('panel-activo');
  })
})

function removeActiveClases(){
  panels.forEach((panel) =>{
    panel.classList.remove('panel-activo')
  })
}
/******************/
const panels2 = document.querySelectorAll('.panel2');
panels2.forEach((panel2)=>{
  panel2.addEventListener('click', ()=>{
    removeActiveClases2();
    panel2.classList.add('panel2-activo');
  })
})

function removeActiveClases2(){
  panels2.forEach((panel2) =>{
    panel2.classList.remove('panel2-activo')
  })
}
/******************/
const panels3 = document.querySelectorAll('.panel3');
panels3.forEach((panel3)=>{
  panel3.addEventListener('click', ()=>{
    removeActiveClases3();
    panel3.classList.add('panel3-activo');
  })
})

function removeActiveClases3(){
  panels3.forEach((panel3) =>{
    panel3.classList.remove('panel3-activo')
  })
}
