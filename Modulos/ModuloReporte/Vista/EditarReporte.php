<?php
require("../../../Modelo/CRUD-OBj.php");

$datoTablaB = 'Nombre_reporte, Tipo_Nombre, Nombre_del_ambiente ';
$consultaInner = " INNER JOIN Tipo_Reporte ON reportes.Tipo_Reporte = Tipo_Reporte.Tipo_Reporte
INNER JOIN Tipo_Elemento ON reportes.Tipo_Elemento_cod = Tipo_Elemento.Tipo_Elemento_cod
INNER JOIN Ambientes ON reportes.Codigo_del_ambiente = Ambientes.Codigo_del_ambiente";
$request = false;
$tablaName = $_GET['tablaName'];
$campoPKs = $_GET['CampoPK'];
$valuePKs = $_GET['ValorPK'];
$data = $CRUD->Select($request, $tablaName, $campoPKs, $valuePKs, $consultaInner, $datoTablaB);
// print_r($data);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../ArchivosCSS\ModuloCSS\Usuario/EditarUsuario.css">
  <title>Document</title>
</head>

<body>
  <?php foreach ($data  as $valor) :
  print_r($valor);
  ?>
    <form id="editarReporte">
      <div id="containerAgregar">
        <div class="row">
          <div class="col-md-4">
            <label for="TipReporte">Tipo de reporte</label>
            <select id="tipoReporte" name="Tip_Reporte" >
              <?php
              $request = true;
              $tableName = 'Tipo_Reporte';
              $campoPK = null;
              $valuePK = null;
              $datoTablaB = null;
              $consultaInner = null;
              $select = $CRUD->Select($request, $tableName, $campoPK, $valuePK, $consultaInner, $datoTablaB);
              foreach ($select as $row) {
                if ($data[0]['Tipo_Reporte']  === $row['Tipo_Reporte']) { ?>
                  <option selected value="<?php echo $valor['Tipo_Reporte']; ?>"><?php echo $row['Nombre_reporte']; ?></option>
                  
                  <?php
                } else {
                ?>
                  <option value="<?php echo $row['Tipo_Reporte']; ?>"><?php echo $row['Nombre_reporte']; ?></option>
                <?php
                }
                ?>

              <?php } ?>
            </select>
          </div>

          <div class="col-md-4">
            <label for="TipElemento">Tipo de elemento</label>
            <select id="tipoElemento" name="Tip_Elemento">
              <?php
              $request = true;
              $tableName = 'Tipo_Elemento';
              $campoPK = null;
              $valuePK = null;
              $datoTablaB = null;
              $consultaInner = null;
              $select = $CRUD->Select($request, $tableName, $campoPK, $valuePK, $consultaInner, $datoTablaB);
              foreach ($select as $row) {
                if ($data[0]['Tipo_Elemento_cod']  === $row['Tipo_Elemento_cod']) { ?>
                  <option selected value="<?php echo $row['Tipo_Elemento_cod']; ?>"><?php echo $row['Tipo_Nombre'];; ?></option>
                  
                  <?php
                } else {
                ?>
                  <option value="<?php echo $row['Tipo_Elemento_cod']; ?>"><?php echo $row['Tipo_Nombre']; ?></option>
                <?php
                }
                ?>
              <?php } ?>
            </select>
          </div>
        </div>

        <div class="row">
          <div class="col-md-4">
            <label>Perteneciente al ambiente</label>
            <select id="Ambiente" name="Ambiente">
              <?php
              $request = true;
              $tableName = 'Ambientes';
              $campoPK = null;
              $valuePK = null;
              $datoTablaB = null;
              $consultaInner = null;
              $select = $CRUD->Select($request, $tableName, $campoPK, $valuePK, $consultaInner, $datoTablaB);

              foreach ($select as $row) {
                if ($data[0]['Codigo_del_ambiente']  === $row['Codigo_del_ambiente']) { ?>
                  <option selected value="<?php echo $valor['Codigo_del_ambiente']; ?>"><?php echo $row['Nombre_del_ambiente']; ?></option>
                  
                  <?php
                } else {
                ?>
                  <option value="<?php echo $valor['Codigo_del_ambiente']; ?>"><?php echo $row['Nombre_del_ambiente']; ?></option>
                <?php
                }
                ?>

              <?php } ?>
            </select>
          </div>

          <div class="col-md-4">
            <label>Numero de serial</label>
            <input type="Number" name="Serial" value='<?Php  echo $valor['Num_de_serie'] ?>'>
          </div>

          <div class="col-md-4">
            <label >Descripción</label>
            <input type="text" name="Desc" value='<?php echo $valor['Descripcion']  ?>'>
            
            <input type="hidden" name="tableName" value="Reportes">
          </div>
        </div>

        <div class="row">
          <div class="col-md-4">
            <br>
            <input type="submit" onclick="reporteDatosUpdate(4)" value="Editar" id="EditarBoton">
            <input type="hidden" name="Num_Reporte" value="<?php echo $data[0]['Num_Reporte'] ?>">
          </div>
        </div>
      </div>
    </form>
</body>
<script src="../ArchivosJS\Funciones\funcionesSelectsDisable.js"></script>

</html>
<?php endforeach ?>