<?php
require("../../../Modelo/CRUD-OBj.php");
session_start();

$email = $_POST["email"];
$password = $_POST["password"];

$request = false;
$campoPK = "Usu_Correo";
$tableName = "usuarios";
$consultaInner = null;
$datoTablaB = null;
$tablas = null;

$select = $CRUD->Select($request, $tableName, $campoPK, $email, $consultaInner, $datoTablaB,$tablas);

$response = array();

if ($select != null) {
    foreach ($select as $value) {
        $_SESSION['nombre'] = $value["Usu_Nombre"];
        $_SESSION['ID'] = $value["Usu_id"];
        $correoUsu = $value["Usu_Correo"];
        $contraUsu = $value["Usu_contra"];
        $numero_DNI = $value["Usu_Nu_ID"];
        $estado = $value['Usu_Status'];

    }
    if ($correoUsu == $email && $contraUsu == $password) {
        if ($contraUsu == $numero_DNI) {
            $response["correo"] = $email;
            $response["success"] = true;
            $response["modal"] = 1;
            
        } else {
            $response["success"] = true;
            $response["modal"] = 0;
        }
        $response["estado"] = $estado;
    }
}

if (!isset($response["success"])) {
    $response["success"] = false;
}

header('Content-Type: application/json');
echo json_encode($response);
?>
