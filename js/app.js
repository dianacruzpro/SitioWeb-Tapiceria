const grid = new Muuri('.grid',{
  layout:{
    rounding: false
  }
});


window.addEventListener('load', ()=> {
  grid.refreshItems().layout();
  document.getElementById('grid').classList.add('imagenes-cargadas');

  /**Agregando los listeners de los enlaces para filtrar por categoria */
  const enlaces = document.querySelectorAll('#categorias a');
  enlaces.forEach( (enlace)=>{
    enlace.addEventListener("click", (e)=>{
      e.preventDefault();
      enlaces.forEach((enlace) => enlace.classList.remove('activo'));
      e.target.classList.add('activo');

      const categoria = e.target.innerHTML.toLowerCase();
      categoria === 'todos' ? grid.filter('[data-categoria]'): grid.filter(`[data-categoria="${categoria}"]`);
    })
  });

  /**Afgregando el listener para la barra de busqueda*/
  document.querySelector('#barra-busqueda').addEventListener('input', (e) => {
    const busqueda = e.target.value;
    grid.filter((item) => item.getElement().dataset.etiquetas.includes(busqueda));
  });

});




