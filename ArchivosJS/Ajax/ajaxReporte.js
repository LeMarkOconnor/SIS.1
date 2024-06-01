//=====================Procesos para mostrar y editar informacion del usuario=======================

//Mostrar el formulario donde se insertaran los datos del usuario
function FormReporte()
{
    let Insert =
    {
        url:'../Modulos/ModuloReporte/controlador/controller.php',
        method:'POST',
        data: 
            {
            accion: 'Formulario',
            }
    }
    $.ajax(Insert)
    .done((resp) => {
        $('.modal-title').html('Generar Reporte')
        $('.modal-bodyAgregar').html(resp);
    }).fail((error)=>    {   
        $('.modal-bodyAgregar').html(error);
    })
    $('#Agregar').modal('show');
}

//para insertar los datos del usuario enviados desde el formulario
function InsertarReporte(valor) {
    event.preventDefault();
    var formData = $("#GenerarReporte").serialize();

    let valoe = {
        url: '../Modulos/ModuloReporte/controlador/controller.php',
        type: 'POST',
        data: formData + '&accion=Insertar&valor=' + valor
    }

    $.ajax(valoe)
    .done((resp) => {
        alert('Datos Insertados correctamente');
        alert(resp);
    })
    .fail(() =>{
        alert('Ha ocurrido un error al enviar el formulario');
    });
} 
//=====================Procesos para mostrar y enlistar usuarios=======================
function MostrarReporte(valor) {
    var request = true;
    var tableName = 'reportes';
    let variable = {
        url: '../Modulos/ModuloReporte/controlador/controller.php',
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
        $('.modal-title').html('Rportes');
        $('.modal-body').html(resp);
        console.log(resp);
    })
    .fail(()=>{ 
        alert('Error al realizar la solicitud');
    })
    $("#Listar").modal("show");
}

//Para una consulta filtrada
function ConsultaReporte(valor) {
    event.preventDefault();
    var request = 0; 
    var FormularioConsulta = $('#consultaSelect').serialize();
    alert(FormularioConsulta);
    let variable = {
        type: 'POST',
        url: '../Modulos/ModuloReporte/controlador/controller.php',
        data: FormularioConsulta + '&accion=mostrar&request=' + request + '&valor=' + valor + '&tableName=Reportes' 
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




//=====================Procesos para mostrar y editar informacion del usuario=======================

//-----Para mostrar la vista donde ese mostraran los datos del usuario en el formulario y podra editarlos
function consultarParaEditarReporte(campoPK, valorPK, tableName) {
    $("#Listar").modal("hide");
    let variableD = {
        url: '../Modulos/ModuloReporte/controlador/controller.php',
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
function reporteDatosUpdate(valor) {
    event.preventDefault();
    var formData = $("#editarReporte").serialize();
    alert(formData);
    let valoe =
    {
        url: '../Modulos/ModuloReporte/controlador/controller.php',
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
