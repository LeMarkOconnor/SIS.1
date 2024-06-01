<?php
require ("../../../Modelo/CRUD-OBj.php");

$request = false;
$tablaName = $_GET['tablaName'];
$campoPKs = $_GET['CampoPK'];
$valuePKs = $_GET['ValorPK'];
$consultaInner = null;
$datoTablaB = null;
$tablas = null;
$selectUpdate = $CRUD->Select($request, $tablaName, $campoPKs, $valuePKs,$consultaInner,$datoTablaB,$tablas); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../ArchivosCSS\ModuloCSS\Elemento/EditarElemento.css">
    <title>Document</title>
</head>
<body>
  <?php  foreach ($selectUpdate  as $valor):
    ?>
<form id="FormularioElementoEditar">
  <div class="containerEditar">
  <div class="row">
      <div class="col-md-4">
        <label for="nombre">Marca</label>
        <input type="text" name="marca" value="<?php echo $valor['marca'] ?>">
        <input type="hidden" name="valorPK" value=" <?php echo $valuePKs ?> ">
        <input type="hidden" name="campoPK" value=" <?php echo $campoPKs ?> ">
      </div>

      <div class="col-md-4">
        <label for="apellido">Serial</label>
        <input type="text" id="descripcion" name="serial" value="<?php echo $valor['serial'] ?>">
        <input type="hidden" name="tablaNombre" value="elemento">
      </div>
     
      <div class="col-md-4">
    <label for="activarRolSelect" class="checkbox-label">
        Tipo Elemento:
        <input type="checkbox" id="activarRolSelect" onchange="toggleSelectTipoElemento(this)" class="checkbox-input">
    </label>
    <select name="tipoelemento" id="tipoelemento" disabled>
        <?php
        $request = true;
        $tablaNombre = "tipo_elemento";
        $campoPK = NULL;
        $valuePK = NULL;
        $selectTipoElemento = $CRUD->Select($request, $tablaNombre, $campoPK, $valuePK, $consultaInner, $datoTablaB, $tablas);
        foreach ($selectTipoElemento as $value):
            ?>
            <option value="<?php echo $value['Tipo_Elemento_cod'] ?>"><?php echo $value['Tipo_Nombre'] ?></option>
        <?php
        endforeach;
        ?>
    </select>
    <input type="hidden" name="tipoelementodefault" id="tipo_Elemento_Hidden" value="<?php echo $valor['tipo_elemento_cod'] ?>">
</div>

    <div class="row">
      <div class="col-md-4">
        <label for="apellido">Ambiente</label>
        <select name="ambiente" id="tipoelemento">
        <?php
        $tablaNombre = "ambientes";
        $selectTipoElemento = $CRUD->Select($request, $tablaNombre, $campoPK, $valuePK, $consultaInner, $datoTablaB, $tablas);
        foreach ($selectTipoElemento as $value):
            ?>
            <option value="<?php echo $value['Codigo_del_ambiente'] ?>"><?php echo $value['Nombre_del_ambiente'] ?></option>
        <?php
        endforeach;
        ?>
    </select>
      </div>

    <div class="row">
      <div class="col-md-4">
        <br>
        <input type="submit" onclick="ElementoDatosUpdate(4)" value="Editar" id="AgregarBoton">
      </div>
    </div>
  </div>
</form>
</body>
<script src="../ArchivosJS\Funciones\funcionesSelectsDisable.js"></script>
</html>
    <?php endforeach?>
