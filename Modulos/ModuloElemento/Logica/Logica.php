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
$marca = $_POST['marca'];
$serial = $_POST['serial'];
$tipoelemento = $_POST['tipoelemento'];
$ambiente = $_POST['ambientes'];

$campos = ["marca", "serial", "tipo_elemento_cod", "ambiente"];
$values = [$marca, $serial, $tipoelemento, $ambiente];

$CRUD->Insert($tablaNombre, $campos, $values);
    }
elseif ($valor === '2') 
    {
//Mostrar Usuario Funciona
$request = isset($_POST['request']) ? $_POST['request'] : null;
$tablaNombre = isset($_POST['tableName']) ? $_POST['tableName'] : null;
$campoPK = isset($_POST['valorConsulta'])  ? $_POST['campo'] : null;
$valuePK = isset($_POST['valorConsulta']) ? $_POST['valorConsulta'] : null;
$consultaInner = 
[
    ['elemento.tipo_elemento_cod','tipo_elemento.Tipo_Elemento_cod']

];
$tablas = ['tipo_elemento'];
$datoTablaB = ['elemento.elemento_id','elemento.marca','elemento.serial','elemento.ambiente','tipo_elemento.Tipo_Nombre'];

$selectElemento = $CRUD->Select($request, $tablaNombre, $campoPK, $valuePK, $consultaInner,$datoTablaB,$tablas); 
}
elseif($valor === '4')
    {
//Nombre Tabla
$tablaNombre = $_POST['tablaNombre'];
//Datos Usuarios
$marca = $_POST['marca'];
$serial = $_POST['serial'];
$tipoelemento = isset($_POST['tipoelemento']) ? $_POST['tipoelemento'] : $_POST['tipoelementodefault'];
$ambiente = $_POST['ambiente'];
//campoPKs
$campoPK = $_POST['campoPK'];
//ValorPKs
$valorPK = $_POST['valorPK'];
var_dump($_POST);
    
$campos = ["marca", "serial", "tipo_elemento_cod", "ambiente"];
$valores = [$marca, $serial, $tipoelemento, $ambiente];
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
