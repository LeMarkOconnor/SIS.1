$(document).ready(function() {
    $('#loginForm').submit(function(e) {
        e.preventDefault(); 
        var formData = $(this).serialize();
        $.ajax({
            type: 'POST',
            url: 'Modulos/ModuloLogin/controlador/controller.php', 
            data: formData + "&accion=Login"
        })
        .done(function(response) {
                if (response.success) {
                    if (response.estado == 'Alta') {
                    if (response.modal == 1) {
                        // Redirigir con modal 1
                        window.location.href = "viewGeneral/principal.php?show_modal=1&correo=" + response.correo + "&nombre=" + response.nombre;
                    } else {
                        // Redirigir con modal 0
                        window.location.href = "viewGeneral/principal.php?show_modal=0&nombre=" + response.nombre;
                    }
                } else if (response.estado == 'Baja') {
                    alert('El usuario ha sido dado de baja');
            } 
            }else {
                alert("Correo y/o contraseña incorrectos");
            }
        })
        .fail(function() {
            alert("Error en la solicitud AJAX");
        });
    });
});

/*Función para mostrar contraseña */
function togglePasswordVisibility() {
    var passwordInput = document.getElementById("password");
    var showPasswordBtn = document.getElementById("showPasswordBtn");

    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        showPasswordBtn.innerHTML = '<i class="fas fa-eye-slash"></i>';
    } else {
        passwordInput.type = "password";
        showPasswordBtn.innerHTML = '<i class="fa fa-eye fa-beat"></i>';
    }
}


