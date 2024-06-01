<?php
require ("../../../Modelo/CRUD-OBj.php");
if (isset($_POST['valor'])) 
{
$valor = $_POST['valor'];

if ($valor === '1')
    {
//Nombre Tabla
$tablaNombre = $_POST['tableName'];
//Datos Usuarios
$Tip_Reporte = $_POST['Tip_Reporte'];
$Tip_Elemento = $_POST['Tip_Elemento'];
$Ambiente = $_POST['Ambiente'];
$Serial = $_POST['Serial'];
$Desc = $_POST['Desc'];

$campos = ["Tipo_Reporte", "Tipo_Elemento_cod", "Num_de_serie", "Codigo_del_ambiente", "Descripcion"];
$values = [$Tip_Reporte, $Tip_Elemento, $Serial, $Ambiente, $Desc];

$CRUD->Insert($tablaNombre, $campos, $values);
    }
elseif ($valor === '2') 
    {
//Mostrar Usuario Funciona
$request = isset($_POST['request']) ? $_POST['request'] : null;
$tableName = isset($_POST['tableName']) ? $_POST['tableName'] : null;
$campoPK = isset($_POST['valorConsulta'])  ? $_POST['campo'] : null;
$valuePK = isset($_POST['valorConsulta']) ? $_POST['valorConsulta'] : null;
$datoTablaB = ['Nombre_Reporte','Tipo_Nombre','Nombre_del_ambiente'];
$consultaInner = [
    ['reportes.Tipo_Reporte','Tipo_Reporte.Tipo_Reporte'],
    ['reportes.Tipo_Elemento_cod','tipo_elemento.Tipo_Elemento_cod'],
    ['reportes.Codigo_del_ambiente','ambientes.Codigo_del_ambiente']
];
$tablas = ['tipo_reporte','tipo_elemento','ambientes'];

$select = $CRUD->Select($request, $tableName, $campoPK, $valuePK, $consultaInner,$datoTablaB,$tablas); 
}
elseif($valor === '4')
    {

//Nombre Tabla
$tablaName = $_POST['tableName'];
//Datos Usuarios
$Tip_Reporte = $_POST['Tip_Reporte'];
$Tip_Elemento = $_POST['Tip_Elemento'];
$Serial = $_POST['Serial'];
$Ambiente = $_POST['Ambiente'];
$Desc = $_POST['Desc'];
//campoPKs
// $campoPK = $_POST['campoPK'];
//ValorPKs
// $valorPK = $_POST['valorPK'];
    
$campos = ["Tipo_Reporte", "Tipo_Elemento_cod",  "Codigo_del_ambiente", "Num_de_serie", "Descripcion"];
$values = [$Tip_Reporte, $Tip_Elemento,  $Ambiente, $Serial, $Desc];
// Ejecutar la función Update()
$resultado = $CRUD->Update($campos, $values, $tablaName, "Num_Reporte", $_POST['Num_Reporte']);  
    }
}

if (isset($_GET['valor'])) {
    $valor = $_GET['valor'];
if ($valor === '3')
    $tableName = $_GET['tablaName'];
    $campoPK = $_GET  ['CampoPK'];
    $valorPK = $_GET  ['valorPK'];
    $estado = $_GET   ['status'];
    $campos = ['Usu_Status'];
    $valores = [$estado];

    $CRUD->Update($campos, $valores, $tableName, $campoPK, $valorPK);
}

//=================================Multi Reporte 
   

?>
