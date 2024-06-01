<?php
require ("../../../Modelo/CRUD-OBj.php");

$request = false;
$tablaName = $_GET['tablaName'];
$campoPKs = $_GET['CampoPK'];
$valuePKs = $_GET['ValorPK'];
$consultaInner = null;
$datoTablaB = null;
$selectUpdate = $CRUD->Select($request, $tablaName, $campoPKs, $valuePKs,$consultaInner,$datoTablaB); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../ArchivosCSS\ModuloCSS\TipoElemento/EditarTipoElemento.css">
    <title>Document</title>
</head>
<body>
  <?php  foreach ($selectUpdate  as $valor):
    ?>
<form id="FormularioTipoElementoEditar">
  <div class="containerEditar">
    <div class="row">
      <div class="col-md-4">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" value="<?Php echo $valor['Tipo_Nombre']?>">
        <input type="hidden" name="campoPK" value='<?php echo $campoPKs?>'>
        <input type="hidden" name="valorPK" value='<?php echo $valuePKs?>'>
      </div>

      <div class="col-md-4">
        <label for="apellido">Descripcion:</label>
        <input type="text" id="descripcion" name="descripcion"  value="<?Php echo $valor['Tipo_Desc']?>">
        <input type="hidden" name="tablaNombre" value="tipo_elemento">
      </div>
     
    <div class="row">
      <div class="col-md-4">
        <br>
        <input type="submit" onclick="TipoElementoDatosUpdate(4)" value="Agregar" id="AgregarBoton">
      </div>
    </div>
  </div>
</form>
</body>
<script src="../ArchivosJS\Funciones\funcionesSelectsDisable.js"></script>
</html>
    <?php endforeach?>
