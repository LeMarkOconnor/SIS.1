document.getElementById('searchbutton').addEventListener('click', function() {
// Selecciona el input por su ID
var searchInput = document.getElementById('searchinput');

// Cambia la clase del input para mostrarlo u ocultarlo
if (searchInput.style.display === 'none') {
    searchInput.style.display = 'block';
} else {
    searchInput.style.display = 'none';
}
});

function updateClock() {
var now = new Date();
var hours = now.getHours();
var minutes = now.getMinutes();

// Formatea las horas y minutos como texto
var timeString = hours + ':' + (minutes < 10 ? '0' : '') + minutes;

// Actualiza el contenido del reloj
document.getElementById('clock').textContent = timeString;
}

// Actualiza el reloj cada minuto (60,000 milisegundos)
setInterval(updateClock, 60000);

// Llama a la función para inicializar el reloj
updateClock();


// Funcion para los nombres de los iconos en el menu
function showInfo(element) {
    element.querySelector('.informe').style.display = 'block';
  }
  
  function hideInfo(element) {
    element.querySelector('.informe').style.display = 'none';
  }

  //Función para los menús desplegables
  function showInfo(element) {
    element.querySelector('.menu-flotante').style.display = 'block';
  }
  
  function hideInfo(element) {
    element.querySelector('.menu-flotante').style.display = 'none';
  }
  
  function accionBoton1() {
    // Lógica para el botón 1
  }
  
  function accionBoton2() {
    // Lógica para el botón 2
  }
  
  function accionBoton3() {
    // Lógica para el botón 3
  }
  

  //Logica para los menus flotantes
  
  function showDropdown(menuId) {
    clearTimeout(window[menuId + 'TimeoutId']);
    document.getElementById(menuId).style.display = "block";
  }
  
  function hideDropdown(menuId) {
    window[menuId + 'TimeoutId'] = setTimeout(() => {
      document.getElementById(menuId).style.display = "none";
    }, 1000);
  }
  

  
  

