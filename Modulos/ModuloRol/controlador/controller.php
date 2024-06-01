<?php

//Para mostrar el formulario,
if (isset($_POST['accion']) && $_POST['accion'] === 'mostrar') 
{
    include('../Vista/MostrarRol.php');
}
elseif (isset($_POST['accion']) && $_POST['accion'] === 'Formulario') 
{
    include('../Vista/FormularioInsert.php');
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
    include('../Vista/FormularioEditar.php');
}
elseif (isset($_POST['accion']) && $_POST['accion'] === 'Editar') 
{
    include('../Logica/Logica.php');
}





?>

