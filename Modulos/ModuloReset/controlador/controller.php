<?Php    
if (isset($_GET['accion']) && $_GET['accion'] === 'FormularioModificar') 
{
    include('../Vista/contrasenaNueva.php');
}
elseif (isset($_POST['accion']) && $_POST['accion'] === 'Modificar') 
{
    include('../logica/logica.php');
}


?>