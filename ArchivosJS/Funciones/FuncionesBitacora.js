// Funcionesbitacora.js

document.addEventListener('DOMContentLoaded', function() {
    var noEquipOption = document.getElementById('noEquip');
    var equipList = document.getElementById('equipList');

    noEquipOption.addEventListener('change', function() {
        // Mostrar u ocultar la lista de equipos según la selección del radio button
        equipList.style.display = this.checked ? 'block' : 'none';
    });

    var siEquipOption = document.getElementById('siEquip');
    siEquipOption.addEventListener('change', function() {
        // Ocultar la lista de equipos cuando se selecciona "Sí"
        equipList.style.display = this.checked ? 'none' : 'block';
    });


    var noInmueOption = document.getElementById('noInmue');
    var inmueList = document.getElementById('inmueList');

    noInmueOption.addEventListener('change', function() {
        // Mostrar u ocultar la lista de inmuebles según la selección del radio button
        inmueList.style.display = this.checked ? 'block' : 'none';
    });

    var siInmueOption = document.getElementById('siInmue');
    siInmueOption.addEventListener('change', function() {
        // Ocultar la lista de inmuebles cuando se selecciona "Sí"
        inmueList.style.display = this.checked ? 'none' : 'block';
    });
});

