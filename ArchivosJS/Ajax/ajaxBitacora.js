//Nombre tabla
var tablaName = 'elemento';

//Tabla principal del modulo
var tablaNameUse = 'bitacora';

//===============================Paso uno de la bitacora-Seleccionar ambiente
function FormBitacoraPASS_ONE()
{
    let BitPASS_ONE = 
    {
        url: '../ModuloUniqual/ModuloBitacora/controlador/controller.php',
        method: 'POST',
        data: 
        {
            accion: 'AmbientesBit',
            process: 'selectAmbientes'
        }
    }

    $.ajax(BitPASS_ONE)
    .done((resp) => 
    {
        $('.modal-title').html('Bitacora');
        $('.modal-bodyBitPASS_ONE').html(resp);
    })
    .fail((resp) => 
    {
        $('.modal-bodyBitPASS_ONE').html(resp);
    })
    $("#BitPASS_ONE").modal("show");
}

//===============================Paso dos de la bitacora-Mostrar conteo de elementos
function FormBitacoraPASS_TWO()
{
    var FormularioBitPASS_TWO = $('#selectAmbientesBit').serialize();
    let BitPASS_TWO = 
    {
        url: '../ModuloUniqual/ModuloBitacora/controlador/controller.php',
        method: 'POST',
        data: FormularioBitPASS_TWO + '&accion=BitacoraV1&process=selectCountElementsV1&nameTable=' + tablaName
    }

    $.ajax(BitPASS_TWO)
    .done((resp) => 
    {
        $('.modal-title').html('Bitacora');
        $('.modal-bodyBitPASS_ONE').html(resp);
    })
    .fail((resp) => 
    {
        $('.modal-bodyBitPASS_ONE').html(resp);
    })
    $("#BitPASS_ONE").modal("show");
}


function FormBitacoraPASS_TWO2()
{
    let BitPASS_TWO2 = 
    {
        url: '../ModuloUniqual/ModuloBitacora/controlador/controller.php',
        method: 'POST',
        data: {

        accion: "BitacoraV1",
        process: "selectCountElementsV1",
        nameTable: tablaName
    }}

    $.ajax(BitPASS_TWO2)
    .done((resp) => 
    {
        $('.modal-title').html('Bitacora');
        $('.modal-bodyBitPASS_ONE').html(resp);
    })
    .fail((resp) => 
    {
        $('.modal-bodyBitPASS_ONE').html(resp);
    })
    $("#BitPASS_ONE").modal("show");
}

//===============================Bitacora ---> Procesos normales con crud

function FormBitacora()
{
    var formPreBitacora = $('#formbitacora').serialize();
        let bitForm =
    {
        url: '../ModuloUniqual/ModuloBitacora/controlador/controller.php',
        method: 'POST',
        data: formPreBitacora + '&accion=BitacoraInsert&process=insertBita&tablaname='+tablaNameUse
    }
    $.ajax(bitForm)
    .done((resp) => 
    {
        alert('Bitacora generada');
    })
    .fail((resp) =>
    {

    })
    $("#BitPASS_ONE").modal("hide");

}

function FormBitacoraUpdate(codBita)
{
    var formPreBitacora = $('#formbitacora').serialize();
    let bitForm =
    {
        url: '../ModuloUniqual/ModuloBitacora/controlador/controller.php',
        method: 'POST',
        data: formPreBitacora + '&accion=BitacoraUpdate&process=updateBita&tablaname='+tablaNameUse+'&codigoBitacora='+codBita
    }
    $.ajax(bitForm)
    .done((resp) => 
    {
        alert('Bitacora completada');
    })
    .fail((resp) =>
    {

    })
    $("#BitPASS_ONE").modal("hide");
}

function Pruebacollapse() {
    var collapseElement = document.getElementById('collapseExample');
    if (collapseElement.classList.contains('show')) {
      collapseElement.classList.remove('show');
    } else {
      collapseElement.classList.add('show');
    }
  }

function ReportBitacora(ambiCod)
{
    $("#BitPASS_ONE").modal("hide");
    let Insert =
    {
        url:'../Modulos/ModuloReporte/controlador/controller.php',
        method:'POST',
        data: 
            {
            accion: 'MultiFormulario',
            ambiCod: ambiCod,
            valor: 8,
            nameTable: tablaName
            }
    }
    $.ajax(Insert)
    .done((resp) => {
        $('.modal-title').html('Generar Reporte');
        $('.modal-bodyReporte').html(resp);
    }).fail((error)=>    {   
        $('.modal-bodyReporte').html(error);
        alert (resp);

    })
    $('#Reporte').modal('show');
}