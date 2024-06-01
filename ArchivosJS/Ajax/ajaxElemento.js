//=====================Procesos para mostrar y editar informacion del usuario=======================

//Mostrar el formulario donde se insertaran los datos del usuario
function formularioElemento()
{
    let Insert =
    {
        url:'../Modulos/ModuloTipoElemento/controlador/controller.php',
        method:'POST',
        data: 
            {
            accion: 'Formulario',
            }
    }
    $.ajax(Insert)
    .done((resp) => {
        $('.modal-title').html('Agregar tipo elemento')
        $('.modal-bodyAgregar').html(resp);
    }).fail((error)=>    {   
        $('.modal-bodyAgregar').html(error);
    })
    $('#Agregar').modal('show');
}

//para insertar los datos del usuario enviados desde el formulario
function InsertarTipoElemento(valor) {
    event.preventDefault();
    var formData = $("#FormularioElementoInsertar").serialize();
    alert(formData);

    let valoe = {
        url: '../Modulos/ModuloTipoElemento/controlador/controller.php',
        type: 'POST',
        data: formData + '&accion=Insertar&valor=' + valor
    }

    $.ajax(valoe)
    .done((resp) => {
        alert('Datos Insertados correctamente');
        console.log(resp);
    })
    .fail(() =>{
        alert('Ha ocurrido un error al enviar el formulario');
    });
} 
//=====================Procesos para mostrar y enlistar usuarios=======================
function mostrarTipoElemento(valor) {
    var request = true;
    var tableName = 'tipo_elemento';
    let variable = {
        url: '../Modulos/ModuloTipoElemento/controlador/controller.php',
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
        $('.modal-title').html('Tipo elemento');
        $('.modal-body').html(resp);
    })
    .fail(()=>{ 
        alert('Error al realizar la solicitud');
    })
    $("#Listar").modal("show");
}

//Para una consulta filtrada
function ConsultaTipoElemento(valor) {
    event.preventDefault();
    var request = 0; 
    var FormularioConsulta = $('#consultaSelect').serialize();
    alert(FormularioConsulta);
    let variable = {
        type: 'POST',
        url: '../Modulos/ModuloTipoElemento/controlador/controller.php',
        data: FormularioConsulta + '&accion=mostrar&request=' + request + '&valor=' + valor + '&tableName=tipo_elemento' 
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
function eliminarRegistroTipoElemento(campoPK, valorPK, tableName, valor) {
    event.preventDefault();
    let variable = {
        url: '../Modulos/ModuloTipoElemento/controlador/controller.php',
        method: 'GET',
        data: {
            accion: 'Eliminar',
            tablaName: tableName,
            CampoPK: campoPK,
            valorPK: valorPK,
            valor: valor
        },
    };
    $.ajax(variable)
    .done((resp) => { 
        alert('Tipo de elemento Eliminado');
        $('.modal-titleEliminar-Editar').html('Eliminar tipo elemento');
        $('.modal-bodyEditar').html(resp);
    })
    .fail(() => { 
    })
    $("#Listar").modal("hide");
    $("#Eliminar-Editar").modal("show");
}



//=====================Procesos para mostrar y editar informacion del usuario=======================

//-----Para mostrar la vista donde ese mostraran los datos del usuario en el formulario y podra editarlos
function consultarParaTipoElemento(campoPK, valorPK, tableName) {
    $("#Listar").modal("hide");
    let variableD = {
        url: '../Modulos/ModuloTipoElemento/controlador/controller.php',
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
        $('.modal-titleEliminar-Editar').html('Editar tipo elemento');
        $('.modal-bodyEditar').html(resp);
    })
    .fail((error)=>{
        alert('No a funcionado');
        console.log(error);
    })
    $("#Editar").modal("show");
}


//-----Para Enviar los datos del formulario y actualizarlos
function TipoElementoDatosUpdate(valor) {
    event.preventDefault();
    var formData = $("#FormularioTipoElementoEditar").serialize();
    alert(formData);
    let valoe =
    {
        url: '../Modulos/ModuloTipoElemento/controlador/controller.php',
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
    }
