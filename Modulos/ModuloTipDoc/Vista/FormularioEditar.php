<?php
require ("../../../Modelo/CRUD-OBj.php");

// Definir un array asociativo para mapear nombres personalizados
$labels = array(
  "Cod_Doc" => "Codigo del documento",
  "NTDoc" => "Nombre del documento",
);

$request = false;
$tablaName = $_GET['tablaName'];
$campoPKs = $_GET['CampoPK'];
$valuePKs = $_GET['ValorPK'];
$datoTablaB = NULL;
$consultaInner = NULL;
$tablas = null;
$selectDoc = $CRUD->Select($request, $tablaName, $campoPKs, $valuePKs, $consultaInner, $datoTablaB,$tablas ); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../ArchivosCSS\ModuloCSS\TipoDocumento/EditarTipoDocumento.css">
    <title> Editar Tipo documento</title>
</head>
<body>
<form id="EditarDoc">
<?php foreach ($selectDoc as $row): ?>
    <form id="FormularioEditarDoc">
  <div class="containerEditar">
    <div class="row">
      <div class="col-md-4">
        <label for="apellido">Nombre del Documento</label>
        <input type="text" id="NomDoc" name="NomDoc" value="<?php echo $row['NTDoc'] ?>">
        <input type="hidden" name="campoPK" value='<?php echo $campoPKs?>'>
        <input type="hidden" name="valorPK" value='<?php echo $valuePKs?>'>
      </div>
  
      <div class="col-md-4">
        <label>Descripcion</label>
          <input type="text" id="DescDoc" name="DescDoc" value="<?php echo $row['Desc_Doc'] ?>">
      </div>
    </div>

    <div class="row">
      <div class="col-md-4">
        <br>
        <input type="hidden" value="tbl_tip_doc" id="tableName" name="tableName">
        <input type="submit" onclick='DocumentoDatosUpdate(4)' value="Editar"></a>
      </div>
    </div>
    </div>
  </form>
<?php endforeach; ?>
</form>


</body>
</html>
