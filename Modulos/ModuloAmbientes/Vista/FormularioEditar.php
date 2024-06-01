<?php
require ("../../../Modelo/CRUD-OBj.php");

// Definir un array asociativo para mapear nombres personalizados
$labels = array(
  "Codigo_del_ambiente" => "Codigo del ambiente",
  "Nombre_del_ambiente" => "Nombre del Ambinete",
  "Fecha_de_activacion" => "Fecha de activacion",
  "Usado_por_ultima_vez" => "Usado por ultima vez",
);


$request = false;
$tablaName = $_GET['tablaName'];
$campoPKs = $_GET['CampoPK'];
$valuePKs = $_GET['ValorPK'];
$select = $CRUD->Select($request, $tablaName, $campoPKs, $valuePKs); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Modal\Usuario\EditarUsuario.css">
    <title> Edita ambiente</title>
</head>
<body>
<form id="EditarAmbiente">
<?php foreach ($select as $row): ?>
    <?php
        //Guardamos el PK
        $campoPK = key($row);
        $valorPK = current($row);
        //Quitamos El id para que no salga
        array_shift($row);
    ?>
    <?php foreach ($row as $key => $value): ?>
        <!-- Mostrar los valores originales en los campos de entrada -->
        <label><?php echo isset($labels[$key]) ? $labels[$key] : $key ?>:</label>
        <input type="text" name="campos[]" value="<?php echo htmlspecialchars($key); ?>" style="display: none;">
        <input type="text" name="values[]" value="<?php echo htmlspecialchars($value); ?>"><br>
    <?php endforeach; ?>
    <br>
<?php endforeach; ?>
<input type="hidden" name="campoPK" value="<?php echo htmlspecialchars($campoPK); ?>">
<input type="hidden" name="valorPK" value="<?php echo htmlspecialchars($valorPK); ?>">
<input type="hidden" name="tableName" value="<?php echo htmlspecialchars($tablaName); ?>">
<input type="submit" onclick='AmbientesDatosUpdate(4)' value="Editar"></a>
<?php echo $tablaName ?>
</form>

</body>
</html>
