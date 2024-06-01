//=====================Procesos para mostrar y editar informacion del usuario=======================

//Mostrar el formulario donde se insertaran los datos del usuario
function FormularioUsuario()
{
    let Insert =
    {
        url:'../Modulos/ModuloUsuario/controlador/controller.php',
        method:'POST',
        data: 
            {
            accion: 'Formulario',
            }
    }
    $.ajax(Insert)
    .done((resp) => {
        $('.modal-title').html('Agregar Usuario')
        $('.modal-bodyAgregar').html(resp);
    }).fail((error)=>    {   
        $('.modal-bodyAgregar').html(error);
    })
    $('#Agregar').modal('show');
}

//para insertar los datos del usuario enviados desde el formulario
function InsertarUsuario(valor) {
    event.preventDefault();
    var formData = $("#FormularioUsuarioInsertar").serialize();

    let valoe = {
        url: '../Modulos/ModuloUsuario/controlador/controller.php',
        type: 'POST',
        data: formData + '&accion=Insertar&valor=' + valor
    }

    $.ajax(valoe)
    .done((resp) => {
        alert('Datos Insertados correctamente');
    })
    .fail(() =>{
        alert('Ha ocurrido un error al enviar el formulario');
    });
} 
//=====================Procesos para mostrar y enlistar usuarios=======================
function MostrarUsuarios(valor) {
    var request = true;
    var tableName = 'usuarios';
    let variable = {
        url: '../Modulos/ModuloUsuario/controlador/controller.php',
        method: 'POST',
        data: {
            accion: 'mostrar',
            request: request,
            tableName: tableName,
            valor: valor
        }
    }
    $.ajax(variable)
    .done((resp) => {
        $('.modal-title').html('Usuarios');
        $('.modal-body').html(resp);
        console.log(resp);
    })
    .fail(()=>{ 
        alert('Error al realizar la solicitud');
    })
    $("#Listar").modal("show");
}

//Para una consulta filtrada
function ConsultaUsuario(valor) {
    event.preventDefault();
    var request = 0; 
    var FormularioConsulta = $('#consultaSelect').serialize();
    alert(FormularioConsulta);
    let variable = {
        type: 'POST',
        url: '../Modulos/ModuloUsuario/controlador/controller.php',
        data: FormularioConsulta + '&accion=mostrar&request=' + request + '&valor=' + valor + '&tableName=usuarios' 
    };

    $.ajax(variable)
    .done((resp) => {
        $('.modal-body').html(resp);
    })
    .fail((error) => { 
        alert('Error al realizar la solicitud');
    });

}

//=====================Procesos para eliminar un usuario=======================
function eliminarRegistroUsuario(campoPK, valorPK, tableName, valor, status) {
    event.preventDefault();
    let variable = {
        url: '../Modulos/ModuloUsuario/controlador/controller.php',
        method: 'GET',
        data: {
            accion: 'Eliminar',
            tablaName: tableName,
            CampoPK: campoPK,
            valorPK: valorPK,
            valor: valor,
            status: status
        },
    };
    $.ajax(variable)
    .done((resp) => { 
        $('.modal-titleEliminar-Editar').html('Eliminar usuario');
        $('.modal-bodyEditar').html(resp);
    })
    .fail(() => { 
    })
    $("#Listar").modal("hide");
}



//=====================Procesos para mostrar y editar informacion del usuario=======================

//-----Para mostrar la vista donde ese mostraran los datos del usuario en el formulario y podra editarlos
function consultarParaEditarUsuario(campoPK, valorPK, tableName) {
    $("#Listar").modal("hide");
    let variableD = {
        url: '../Modulos/ModuloUsuario/controlador/controller.php',
        method: 'GET',
        data: {
            accion: 'FormularioEditar',
            CampoPK: campoPK,
            ValorPK: valorPK,
            tablaName: tableName,
        }
    }
    $.ajax(variableD)
    .done((resp) =>{
        $('.modal-titleEliminar-Editar').html('Editar usuario');
        $('.modal-bodyEditar').html(resp);
    })
    .fail((error)=>{
        alert('No a funcionado');
        console.log(error);
    })
    $("#Editar").modal("show");
}


//-----Para Enviar los datos del formulario y actualizarlos
function UsuarioDatosUpdate(valor) {
    event.preventDefault();
    var formData = $("#FormularioUsuarioEditar").serialize();
    alert(formData);
    let valoe =
    {
        url: '../Modulos/ModuloUsuario/controlador/controller.php',
        type: 'POST',
        data: formData + '&accion=Editar&valor=' + valor
    }
    $.ajax(valoe)
    .done((resp) => {
            alert(resp); 
            console.log(resp);
    })
    .fail(() =>{
            alert('Ha ocurrido un error al enviar el formulario');
        })
        $("#Listar").modal("show");
        $("#Editar").modal("hide");
    }
