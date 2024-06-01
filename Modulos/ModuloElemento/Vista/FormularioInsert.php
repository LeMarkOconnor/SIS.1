<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../ArchivosCSS\ModuloCSS\Elemento/AgregarElemento.css">
    <title>Document</title>
</head>
<body>
<form id="FormularioInsertarElemento">
  <div id="containerAgregar">

    <div class="row">
      <div class="col-md-4">
        <label for="nombre">Marca</label>
        <input type="text" name="marca">
      </div>

      <div class="col-md-4">
        <label for="apellido">Serial</label>
        <input type="text" id="descripcion" name="serial">
        <input type="hidden" name="tablaNombre" value="elemento">
      </div>
     
    <div class="col-md-4">
    <label>Tipo elemento:</label>
        <select name="tipoelemento" id="tipoelemento">
          <?php
          require ("../../../Modelo/CRUD-OBj.php");
          $request = true;
          $tablaNombre = "tipo_elemento";
          $tablas = null;
          $campoPK = NULL;
          $valuePK = NULL;
          $consultaInner = NULL;
          $datoTablaB = NULL;
          $selectTipoElemento = $CRUD->Select($request, $tablaNombre, $campoPK, $valuePK, $consultaInner,$datoTablaB,$tablas); 
          foreach ($selectTipoElemento as $value):
            ?>
            <option value="<?php echo $value['Tipo_Elemento_cod'] ?>"><?php echo $value['Tipo_Nombre'] ?></option>
            <?php
          endforeach;
          ?>   
        </select>
      </div>

    <div class="row">
      <div class="col-md-4">
        <label for="ambientes">Ambiente</label>
        <select name="ambientes" id="tipoelemento">
          <?php
          $tablaNombre = "ambientes";
          $selectTipoElemento = $CRUD->Select($request, $tablaNombre, $campoPK, $valuePK, $consultaInner,$datoTablaB,$tablas); 
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
        <input type="submit" onclick="InsertarElemento(1)" value="Agregar" id="AgregarBoton">
      </div>
    </div>
  </div>
</form>
</body>
</html>
