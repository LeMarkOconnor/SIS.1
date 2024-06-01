<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../ArchivosCSS\ModuloCSS\Usuario/AgregarUsuario.css">
    <title>Document</title>
</head>
<body>
<form id="GenerarReporte">
  <div id="containerAgregar">
    <div class="row">
      <div class="col-md-4">
        <label for="TipReporte">Tipo de reporte</label>
        <select id="tipoReporte" name="Tip_Reporte">
          <?php
            require ("../../../Modelo/CRUD-OBj.php");
            $request = true;
            $tableName = 'Tipo_Reporte';
            $campoPK = null; 
            $valuePK = null;
            $datoTablaB = null;
            $consultaInner = null;
            $tablas = null;
            $select = $CRUD->Select($request, $tableName, $campoPK, $valuePK,$consultaInner,$datoTablaB,$tablas);
            foreach ($select as $row):
          ?>
              <option value="<?php echo $row['Tipo_Reporte']; ?>"><?php echo $row['Nombre_reporte']; ?></option>
      <?php
        endforeach;
      ?>
        </select>
      </div>

      <div class="col-md-4">
        <label for="TipElemento">Tipo de elemento</label>
        <select id="tipoElemento" name="Tip_Elemento">
          <?php
            $tableName = 'Tipo_Elemento';
            $select = $CRUD->Select($request, $tableName, $campoPK, $valuePK,$consultaInner,$datoTablaB,$tablas);
            foreach ($select as $row):
          ?>
              <option value="<?php echo $row['Tipo_Elemento_cod']; ?>"><?php echo $row['Tipo_Nombre']; ?></option>
      <?php
        endforeach;
      ?>
        </select>
      </div>
    </div>

    <div class="row">
    <div class="col-md-4">
      <label>Perteneciente al ambiente</label>
        <select id="Ambiente" name="Ambiente">
        <?php
          $tableName = 'Ambientes';
          $select = $CRUD->Select($request, $tableName, $campoPK, $valuePK,$consultaInner,$datoTablaB,$tablas);
        foreach ($select as $row):
        ?>
            <option value="<?php echo $row['Codigo_del_ambiente']; ?>"><?php echo $row['Nombre_del_ambiente']; ?></option>
      <?php
        endforeach;
      ?>
        </select>
      </div>

      <div class="col-md-4">
        <label>Numero de serial</label>
        <input type="Number" name="Serial">
      </div>

      <div class="col-md-4">
        <label for="NumeroDeTelefono">Descripción</label>
        <input type="text" name="Desc">
        <input type="hidden" name="tableName" value="Reportes">
      </div>
    </div>


    <div class="row">
      <div class="col-md-4">
        <br>
        <input type="submit" onclick="InsertarReporte(1)" value="Agregar" id="AgregarBoton">
      </div>
    </div>
    </div>
  </form>

</body>
</html>
</html>
