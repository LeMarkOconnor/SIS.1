<?php
require ("../../../Modelo/CRUD-OBj.php");
if (isset($_POST['valor'])) 
{
$valor = $_POST['valor'];

if ($valor === '8')
    {
//Nombre Tabla
$tableName = $_POST['tableName'];
//Datos del ambiente
$NomAmbiente = $_POST['NomAmbiente'];
$DateActivation = $_POST['DateActivation'];
$LastTimeUse = $_POST['LastTimeUse'];

$campos = ["Nombre_del_ambiente", "Fecha_de_activacion", "Usado_por_ultima_vez"];
$values = [$NomAmbiente, $DateActivation, $LastTimeUse];

$CRUD->Insert($tableName, $campos, $values);
    }
elseif ($valor === '2') 
    {
//Mostrar ambiente
$request = isset($_POST['request']) ? $_POST['request'] : null;
$tablaNombre = isset($_POST['tableName']) ? $_POST['tableName'] : null;
$campoPK = isset($_POST['valorConsulta'])  ? $_POST['campo'] : null;
$valuePK = isset($_POST['valorConsulta']) ? $_POST['valorConsulta'] : null;
$consultaInner = null;
$datoTablaB = null;
$tablas = null;

$select = $CRUD->Select($request, $tablaNombre, $campoPK, $valuePK, $consultaInner,$datoTablaB,$tablas); 
}
elseif($valor === '4')
    {

//Nombre Tabla
$tablaName = $_POST['tableName'];
//campoPKs
$campoPK = $_POST['campoPK'];
//ValorPKs
$valorPK = $_POST['valorPK'];

$campos = $_POST['campos'];
$values = $_POST['values'];
    
// Ejecutar la función Update()
$resultado = $CRUD->Update($campos, $values, $tablaName, $campoPK, $valorPK);  
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
