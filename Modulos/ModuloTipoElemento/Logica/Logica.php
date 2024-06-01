<?php
require ("../../../Modelo/CRUD-OBj.php");
if (isset($_POST['valor'])) 
{
$valor = $_POST['valor'];

if ($valor === '1')
    {
//Nombre Tabla
$tablaNombre = $_POST['tablaNombre'];
//Datos Usuarios
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];

$campos = ["Tipo_Nombre", "Tipo_Desc" ];
$values = [$nombre, $descripcion];

$CRUD->Insert($tablaNombre, $campos, $values);
    }
elseif ($valor === '2') 
    {
//Mostrar Usuario Funciona
$request = isset($_POST['request']) ? $_POST['request'] : null;
$tablaNombre = isset($_POST['tableName']) ? $_POST['tableName'] : null;
$campoPK = isset($_POST['valorConsulta'])  ? $_POST['campo'] : null;
$valuePK = isset($_POST['valorConsulta']) ? $_POST['valorConsulta'] : null;
$consultaInner = null;
$datoTablaB = null;
$tablas = null;

$selectTipoDocumento = $CRUD->Select($request, $tablaNombre, $campoPK, $valuePK, $consultaInner,$datoTablaB,$tablas); 
}
elseif($valor === '4')
    {
//Nombre Tabla
$tablaNombre = $_POST['tablaNombre'];
//Datos Usuarios
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
//campoPKs
$campoPK = $_POST['campoPK'];
//ValorPKs
$valorPK = $_POST['valorPK'];
    
$campos = ["Tipo_Nombre", "Tipo_Desc"];
$valores = [$nombre, $descripcion];
// Ejecutar la función Update()
$resultado = $CRUD->Update($campos, $valores, $tablaNombre, $campoPK, $valorPK);  
    }
}

if (isset($_GET['valor'])) {
    $valor = $_GET['valor'];
if ($valor === '3')
    $tableName = $_GET['tablaName'];
    $campoPK = $_GET  ['CampoPK'];
    $valorPK = $_GET  ['valorPK'];
    $CRUD->Delete($tableName, $campoPK, $valorPK);
}

?>
