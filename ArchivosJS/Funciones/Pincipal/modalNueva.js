$(document).ready(function() {
    // Obtener el valor de show_modal de la URL
    var show_modal = getUrlParameter('show_modal');

    // Verificar si el valor de show_modal es 1 para abrir el modal
    if (show_modal === '1') {
        var userEmail = $('#userEmail').val(); // Obtener el valor del campo de entrada oculto
        $('#ResetContrasena').modal('show');

        let Reset = {
            url: "../Modulos/ModuloReset/controlador/controller.php?accion=FormularioModificar&correo=" + encodeURIComponent(userEmail),
            type: "GET",
        };

        $.ajax(Reset)
            .done((resp) => {
                console.log(resp);
                $('.modal-title').html('Modificar Contrasena')
                $('.modal-bodyReset').html(resp);
            })
            .fail((error) => {
                $('.modal-bodyReset').html(error);
            });
    }
});
// Función para obtener parámetros de la URL por nombre
function getUrlParameter(name) {
    name = name.replace(/[\[]/, '\\[').replace(/[\]]/, '\\]');
    var regex = new RegExp('[\\?&]' + name + '=([^&#]*)');
    var results = regex.exec(location.search);
    return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
};