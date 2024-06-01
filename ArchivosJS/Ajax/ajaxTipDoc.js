//=====================Procesos para mostrar y editar informacion del usuario=======================

//Mostrar el formulario donde se insertaran los datos del usuario
function MostrarFormularioInsertDoc()
{
    let Insert =
    {
        url:'../Modulos/ModuloTipDoc/Controlador/Controller.php',
        method:'POST',
        data: 
            {
            accion: 'Formulario',
            }
    }
    $.ajax(Insert)
    .done((resp) => {
        $('.modal-title').html('Agregar tipo documento');
        $('.modal-bodyAgregar').html(resp);
    }).fail((error)=>    {   
        $('.modal-bodyAgregar').html(error);
    })
    $('#Agregar').modal('show');
}

//para insertar los datos del usuario enviados desde el formulario
function InsertarDoc(valor) {
    event.preventDefault();
    var formData = $("#FormularioInsertarDoc").serialize();
    alert(formData);

    let valoe = {
        url: '../Modulos/ModuloTipDoc/Controlador/Controller.php',
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
function MostrarDocumentos(valor) {
    var request = true;
    var tableName = 'tbl_tip_doc';
    let variable = {
        url: '../Modulos/ModuloTipDoc/Controlador/Controller.php',
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
        $('.modal-title').html('Documentos');
        $('.modal-body').html(resp);
    })
    .fail(()=>{ 
        alert('Error al realizar la solicitud');
    })
    $("#Listar").modal("show");
}

//Para una consulta filtrada
function ConsultaDocumento(valor) {
    event.preventDefault();
    var request = 0; 
    var FormularioConsulta = $('#consultaSelect').serialize();
    alert(FormularioConsulta);
    let variable = {
        type: 'POST',
        url: '../Modulos/ModuloTipDoc/Controlador/Controller.php',
        data: FormularioConsulta + '&accion=mostrar&request=' + request + '&valor=' + valor + '&tableName=tbl_tip_doc' 
    };

    $.ajax(variable)
    .done((resp) => {
        console.log(resp);
        $('.modal-body').html(resp);
    })
    .fail((error) => { 
        alert('Error al realizar la solicitud');
    });

}

//=====================Procesos para eliminar un usuario=======================
function eliminarRegistroDoc(campoPK, valorPK, tableName, valor) {
    event.preventDefault();
    let variable = {
        url: '../Modulos/ModuloTipDoc/Controlador/Controller.php',
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
        alert('Documento Eliminado');
        $('.modal-titleEliminar-Editar').html('Eliminar tipo documento');
        $('.modal-bodyEditar').html(resp);
    })
    .fail(() => { 
    })
    $("#Listar").modal("hide");
    $("#Eliminar-Editar").modal("show");
}



//=====================Procesos para mostrar y editar informacion del usuario=======================

//-----Para mostrar la vista donde ese mostraran los datos del usuario en el formulario y podra editarlos
function consultarParaEditarDocumento(campoPK, valorPK, tableName) {
    $("#Listar").modal("hide");
    let variableD = {
        url: '../Modulos/ModuloTipDoc/Controlador/Controller.php',
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
        $('.modal-titleEliminar-Editar').html('Editar tipo documento');
        $('.modal-bodyEditar').html(resp);
    })
    .fail((error)=>{
        alert('No a funcionado');
        console.log(error);
    })
    $("#Editar").modal("show");
}


//-----Para Enviar los datos del formulario y actualizarlos
function DocumentoDatosUpdate(valor) {
    event.preventDefault();
    var formData = $("#EditarDoc").serialize();
    alert (formData);
    let valoe =
    {
        url: '../Modulos/ModuloTipDoc/Controlador/Controller.php',
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