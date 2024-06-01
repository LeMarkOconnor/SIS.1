<?php
require ("../../../Modelo/CRUD-OBj.php");
if (isset($_POST['valor'])) 
{
$valor = $_POST['valor'];

if ($valor === '1')
    {
//Nombre Tabla
$tablaNombre = $_POST['tableName'];
//Datos Rol
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
    
$campos = ["Rol_Nombre", "Rol_Desc"];
$valores = [$nombre, $descripcion];

$CRUD->Insert($tablaNombre, $campos, $valores);
    }
elseif ($valor === '2') 
    {
//Mostrar Usuario Funciona
$request = isset($_POST['request']) ? $_POST['request'] : null;
$tablaNombre = isset($_POST['tablaName']) ? $_POST['tablaName'] : null;
$campoPK = isset($_POST['valorConsulta'])  ? $_POST['campo'] : null;
$valuePK = isset($_POST['valorConsulta']) ? $_POST['valorConsulta'] : null;
$consultaInner = null;
$datoTablaB = null;
$tablas = null;

$selectRol = $CRUD->Select($request, $tablaNombre, $campoPK, $valuePK,$consultaInner,$datoTablaB,$tablas); 
}
elseif($valor === '4')
    {

//Nombre Tabla
$tablaName = $_POST['tableName'];
//Datos Rol
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
//campoPKs
$campoPK = $_POST['campoPK'];
//ValorPKs
$valorPK = $_POST['valorPK'];
    
$campos = ["Rol_Nombre", "Rol_Desc"];
$valores = [$nombre, $descripcion];
// Ejecutar la función Update()
$resultado = $CRUD->Update($campos, $valores, $tablaName, $campoPK, $valorPK);  
    }
}

if (isset($_GET['valor'])) {
    $valor = $_GET['valor'];

if ($valor === '3')
    $tablaNombre = $_GET['tablaName'];
    $campoPK = $_GET  ['CampoPK'];
    $valorPK = $_GET  ['valorPK'];
    $CRUD->Delete($tablaNombre, $campoPK, $valorPK);
}

?>
