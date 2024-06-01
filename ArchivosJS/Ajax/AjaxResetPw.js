function ContrasenaNueva()
{
    event.preventDefault();
    var formData = $('#resetPassWord').serialize();
    alert(formData);
    let contra = {
        url: "../Modulos/ModuloReset/controlador/controller.php",
        type: 'POST',
        data: formData + '&accion=Modificar'
    }
    $.ajax(contra)
    .done((resp)=>{
        alert('modificacion exitosa');
        window.location.href = ".././Login.php";
        console.log(resp);
    })
    .fail((error) =>{ 
        alert(error);
    })
}