document.addEventListener('DOMContentLoaded', function () {
    // Obtener referencia al botón "Confirmar reporte"
    var confirmarReporteBtn = document.querySelector('#confirmarReporteBtn');

    // Agregar un event listener para el clic en el botón
    confirmarReporteBtn.addEventListener('click', function () {
        // Cerrar la modal
        var modal = new bootstrap.Modal(document.getElementById('exampleModalToggle'));
        modal.hide();

        // Mostrar un mensaje tipo alert
        alert('Tu reporte ha sido enviado');
    });
});

function handleFileSelection() {
    // Obten el input de tipo file
    var fileInput = document.getElementById('fileInput');

    // Obtén el nombre del archivo seleccionado
    var fileName = fileInput.files[0].name;

    // Muestra el nombre del archivo seleccionado (puedes personalizar esto según tus necesidades)
    alert('Archivo seleccionado: ' + fileName);
}
