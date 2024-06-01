//=====================Procesos para mostrar y editar informacion del usuario=======================

//Mostrar el formulario donde se insertaran los datos del usuario
function formularioRol(valor)
{
    let Insert =
    {
        url:'../Modulos/ModuloRol/controlador/controller.php',
        method:'POST',
        data: 
            {
            accion: 'Formulario',
            valor: valor
            }
    }
    $.ajax(Insert)
    .done((resp) => {
        $('.modal-title').html('Agregar Rol')
        $('.modal-bodyAgregar').html(resp);
    }).fail((error)=>    {   
        $('.modal-bodyAgregar').html(error);
    })
    $('#Agregar').modal('show');
}

//para insertar los datos del usuario enviados desde el formulario
    function InsertarRol(valor) {
        event.preventDefault();
        var formData = $("#FormularioRolInsertar").serialize();
        let valoe =
        {
            url: '../Modulos/ModuloRol/controlador/controller.php',
            type: 'POST',
            data: formData + '&accion=Insertar&valor=' + valor
        }
        $.ajax(valoe)
        .done((resp) => {
                alert('Datos Insertados correctamente');     
        })
        .fail(() =>{
                alert('Ha ocurrido un error al enviar el formulario');
            })
        }
    
//=====================Procesos para mostrar y enlistar usuarios=======================
function mostrarRol(valor) {
    var request = true;
    var tableName = 'tb_rol';
    let variable = {
        url: '../Modulos/ModuloRol/controlador/controller.php',
        method: 'POST',
        data: {
            accion: 'mostrar',
            request: request,
            tablaName: tableName,
            valor: valor
        }
    }
    $.ajax(variable)
    .done((resp) => {
        $('.modal-title').html('Roles');
        $('.modal-body').html(resp);
    })
    .fail((error)=>{ 
        alert('Error al realizar la solicitud');
    })
    $("#Listar").modal("show");
}

//Para una consulta filtrada
function ConsultaRol(valor) {
    event.preventDefault();
    var request = 0; 
    var FormularioConsulta = $('#consultaSelect').serialize();
    alert(FormularioConsulta);
    let variable = {
        type: 'POST',
        url: '../Modulos/ModuloRol/controlador/controller.php',
        data: FormularioConsulta + '&accion=mostrar&request=' + request + '&valor=' + valor + '&tablaName=tb_rol' 
    };

    $.ajax(variable)
    .done((resp) => {
        $('.modal-body').html(resp);
    })
    .fail((error) => { 
        alert('Error al realizar la solicitud');
    })

}

//=====================Procesos para eliminar un usuario=======================
function eliminarRegistroRol(campoPK, valorPK, tableName, valor) {
    let variable = {
        url: '../Modulos/ModuloRol/controlador/controller.php',
        method: 'GET',
        data: {
            accion: 'Eliminar',
            tablaName: tableName,
            CampoPK: campoPK,
            valorPK: valorPK,
            valor: valor
        },
    }
    $.ajax(variable)
    .done((resp) => { 
        $('.modal-titleEliminar-Editar').html('Eliminar rol');
        $('.modal-bodyEditar').html(resp);
    })
    .fail(() => { 
    })
    $("#Listar").modal("hide");
    $("#Eliminar-Editar").modal("show");
}



//=====================Procesos para mostrar y editar informacion del usuario=======================

//-----Para mostrar la vista donde ese mostraran los datos del usuario en el formulario y podra editarlos
function consultarParaRol(campoPK, valorPK, tableName) {
    $("#Listar").modal("hide");
    let variableD = {
        url: '../Modulos/ModuloRol/controlador/controller.php',
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
        $('.modal-titleEliminar-Editar').html('Editar rol');
        $('.modal-bodyEditar').html(resp);
    })
    .fail((error)=>{
        alert('No a funcionado');
        console.log(error);
    })
    $("#Editar").modal("show");
}


//-----Para Enviar los datos del formulario y actualizarlos
function RolDatosUpdate(valor) {
    event.preventDefault();
    var formData = $("#FormularioRolEditar").serialize();
    let valoe =
    {
        url: '../Modulos/ModuloRol/controlador/controller.php',
        type: 'POST',
        data: formData + '&accion=Editar&valor=' + valor
    }
    $.ajax(valoe)
    .done((resp) => {
            alert('Datos actualizados correctamente'); 
            alert(resp);
    })
    .fail(() =>{
            alert('Ha ocurrido un error al enviar el formulario');
        })
    }
