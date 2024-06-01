function MostrarDetalles(valorPK, campoPK)
{
    let VerDetalle =
    {
        url: "../Modulos/ModuloNovedades/controlador/controller.php",
        method: 'GET',
        data: 
        {
            accion: 'Mostrar',
            posicion: 2,
            ValorPK: valorPK,
            CampoPK: campoPK
        } 
    }
    $.ajax(VerDetalle)
    .done((resp) => {
        $('.modal-title').html('Reporte numero ' + valorPK);
        $('.modal-bodyMostrarDetalle').html(resp);
        console.log(resp);
        alert('entra');
    })
    .fail((resp) => {
        $('.modal-bodyMostrarDetalle').html(resp);
        console.log(resp);
        
    })
    $('#Detalle').modal('show')
}