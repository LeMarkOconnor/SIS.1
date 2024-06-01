<?php
require ("../../../Modelo/CRUD-OBj.php");

$request = false;
$tablaName = $_GET['tablaName'];
$campoPKs = $_GET['CampoPK'];
$valuePKs = $_GET['ValorPK'];
$consultaInner = null;
$datoTablaB = null;
$tablas = null;
$selectRol = $CRUD->Select($request, $tablaName, $campoPKs, $valuePKs,$consultaInner,$datoTablaB,$tablas); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../ArchivosCSS\ModuloCSS\Rol/EditarRol.css">
    <title>Document</title>
</head>
<body>
  <?php  foreach ($selectRol  as $valor):
    ?>
       <form id="FormularioRolEditar">
  <div id="containerEditar">
    <div class="row">
      <div class="col-md-4">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" value='<?php echo $valor['Rol_Nombre']?>'>
        <input type="hidden" name="campoPK" value='<?php echo $campoPKs?>'>
        <input type="hidden" name="valorPK" value='<?php echo $valuePKs?>'>
      </div>

      <div class="col-md-8">
        <label for="apellido">Descripcion</label>
        <input type="text" name="descripcion" value='<?php echo $valor['Rol_Desc']?>'>
        <input type="hidden" name="tableName" value="tb_rol">
      </div>

    <div class="row">
      <div class="col-md-4">
        <br>
        <input type="submit" onclick="RolDatosUpdate(4)" value="Editar" id="EditarBoton">
      </div>
    </div>
    </div>
  </form>
</body>
</html>
    <?php endforeach?>
