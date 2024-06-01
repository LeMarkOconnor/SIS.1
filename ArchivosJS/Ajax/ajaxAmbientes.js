//=====================Procesos para mostrar y editar informacion del usuario=======================

//Mostrar el formulario donde se insertaran los datos del usuario
function MostrarFormularioInsertAmbientes()
{
    let Insert =
    {
        url:'../Modulos/ModuloAmbientes/controlador/Controller.php',
        method:'POST',
        data: 
            {
            accion: 'Formulario',
            }
    }
    $.ajax(Insert)
    .done((resp) => {
        $('.modal-title').html('Agregar Ambiente')
        $('.modal-bodyAgregar').html(resp);
    }).fail((error)=>    {   
        $('.modal-bodyAgregar').html(error);
    })
    $('#Agregar').modal('show');
}

//para insertar los datos del usuario enviados desde el formulario
function InsertarAmbiente(valor) {
    event.preventDefault();
    var formData = $("#FormularioInsertartAmbientes").serialize();
    alert(formData);

    let valoe = {
        url: '../Modulos/ModuloAmbientes/controlador/Controller.php',
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
function MostrarAmbientes(valor) {
    var request = true;
    var tableName = 'ambientes';
    let variable = {
        url: '../Modulos/ModuloAmbientes/controlador/Controller.php',
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
        $('.modal-title').html('Ambientes');
        $('.modal-body').html(resp);
        console.log(resp);
    })
    .fail(()=>{ 
        alert('Error al realizar la solicitud');
    })
    $("#Listar").modal("show");
}

//Para una consulta filtrada
function Consulta(valor) {
    event.preventDefault();
    var request = 0; 
    var FormularioConsulta = $('#consultaSelect').serialize();
    alert(FormularioConsulta);
    let variable = {
        type: 'POST',
        url: '../Modulos/ModuloAmbientes/controlador/Controller.php',
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
function eliminarRegistro(campoPK, valorPK, tableName, valor) {
    event.preventDefault();
    let variable = {
        url: '../Modulos/ModuloAmbientes/controlador/Controller.php',
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
        alert('Ambinete Eliminado');
        $('.modal-titleEliminar-Editar').html('Eliminar Ambiente');
        $('.modal-bodyEditar').html(resp);
    })
    .fail(() => { 
    })
    $("#Listar").modal("hide");
    $("#Eliminar-Editar").modal("show");
}



//=====================Procesos para mostrar y editar informacion del usuario=======================

//-----Para mostrar la vista donde ese mostraran los datos del usuario en el formulario y podra editarlos
function consultarParaEditarAmbiente(campoPK, valorPK, tableName) {
    $("#Listar").modal("hide");
    let variableD = {
        url: '../Modulos/ModuloAmbientes/controlador/Controller.php',
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
        $('.modal-titleEliminar-Editar').html('Editar ambiente');
        $('.modal-bodyEditar').html(resp);
    })
    .fail((error)=>{
        alert('No a funcionado');
        console.log(error);
    })
    $("#Editar").modal("show");
}


//-----Para Enviar los datos del formulario y actualizarlos
function AmbientesDatosUpdate(valor) {
    event.preventDefault();
    var formData = $("#EditarAmbiente").serialize();
    alert (formData);
    let valoe =
    {
        url: '../Modulos/ModuloAmbientes/controlador/Controller.php',
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