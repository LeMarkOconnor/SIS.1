<?php

//Para mostrar el formulario,
if (isset($_POST['accion']) && $_POST['accion'] === 'mostrar') 
{
    include('../Vista/MostrarReportes.php');
}
elseif (isset($_POST['accion']) && $_POST['accion'] === 'Formulario') 
{
    include('../Vista/GenerarReporte.php');
}
elseif (isset($_POST['accion']) && $_POST['accion'] === 'Insertar') 
{
    include('../Logica/Logica.php');
}
elseif (isset($_GET['accion']) && $_GET['accion'] === 'Eliminar') 
{
    include('../Logica/Logica.php');
}
elseif (isset($_GET['accion']) && $_GET['accion'] === 'FormularioEditar') 
{
    include('../Vista/EditarReporte.php');
}
elseif (isset($_POST['accion']) && $_POST['accion'] === 'Editar') 
{
    include('../Logica/Logica.php');
}
elseif (isset($_POST['accion']) && $_POST['accion'] === 'MultiFormulario') 
{
    include('../Vista/GenerarMultiReporte.php');
}




?>

