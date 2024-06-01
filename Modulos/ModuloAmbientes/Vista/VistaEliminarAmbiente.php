
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Modal\Usuario\EliminarUsuario.css">
    <title>Document</title>
</head>
<body>
    <p id="UsuarioEliminado">Ambinete Eliminado</p>
</body>
</html>
<?php
require ("../Model/CRUD-OBj.php");
if (isset($_GET['valore']) && $_GET['valore'] == 3) {

    $tableName = $_GET['tablaName'];
    $campoPK = $_GET  ['CampoPK'];
    $valorPK = $_GET  ['valorPK'];
    

    $CRUD->Delete($tableName, $campoPK, $valorPK);
}
?>