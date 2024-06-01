<?Php  
require ("../../../Modelo/CRUD-OBj.php");
//Nombre Tabla
$tablaName = 'usuarios';
//Datos Usuarios
$contraNueva = $_POST['conNuevaTwo'];
//campoPKs
$campoPK = 'Usu_Correo';
//ValorPKs
$valorPK = $_POST['Reset'];
    
$campos = ["Usu_contra"];
$valores = [$contraNueva];

// Ejecutar la función Update()
$resultado = $CRUD->Update($campos, $valores, $tablaName, $campoPK, $valorPK);  
?>