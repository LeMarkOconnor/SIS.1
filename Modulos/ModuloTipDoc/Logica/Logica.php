<?php
require ("../../../Modelo/CRUD-OBj.php");
if (isset($_POST['valor'])) 
{
$valor = $_POST['valor'];

if ($valor === '8')
    {
//Nombre Tabla
$tablaNombre = $_POST['tableName'];
//Datos Rol
$NTDoc = $_POST['NomDoc'];
$DescDoc = $_POST['DescDoc'];
    
$campos = ["NTDoc", "Desc_Doc"];
$valores = [$NTDoc, $DescDoc];

$CRUD->Insert($tablaNombre, $campos, $valores);
    }
elseif ($valor === '2') 
    {
//Mostrar tipo de documento
$request = isset($_POST['request']) ? $_POST['request'] : null;
$tableNombre = isset($_POST['tableName']) ? $_POST['tableName'] : null;
$campoPK = isset($_POST['valorConsulta'])  ? $_POST['campo'] : null;
$valuePK = isset($_POST['valorConsulta']) ? $_POST['valorConsulta'] : null;
$datoTablaB = NULL;
$consultaInner = NULL;
$tablas = null;

$selectDoc = $CRUD->Select($request, $tableNombre, $campoPK, $valuePK, $consultaInner, $datoTablaB, $tablas); 
}
elseif($valor === '4')
    {

//Nombre Tabla
$tablaName = $_POST['tableName'];
//Datos Rol
$NTDoc = $_POST['NomDoc'];
$DescDoc = $_POST['DescDoc'];
//campoPKs
$campoPK = $_POST['campoPK'];
//ValorPKs
$valorPK = $_POST['valorPK'];

$campos = ["NTDoc", "Desc_Doc"];
$valores = [$NTDoc, $DescDoc];
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


