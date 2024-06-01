<?php
//incluir la logica con la consulta
include ('../Logica/logica.php');
$request = false;
$tableName = 'bitacora';
$campoPK = 'estado'; 
$valuePK = 'incompleto';
$datoTablaB = null;
$consultaInner = null;
$tablas = null;
$selectBita = $CRUD->Select($request, $tableName, $campoPK, $valuePK, $consultaInner, $datoTablaB,$tablas);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <!--Generar bitacora-->
<?php if(empty($selectBita)): ?>
  <form id='selectAmbientesBit'>
    <label for="apellido">Ambiente</label>
      <select name="ambientes" >
        <?php 
          foreach ($selectAmbientes as $ambientes):
        ?>
        <option value="<?php echo $ambientes['Codigo_del_ambiente'] ?>"><?php echo $ambientes['Nombre_del_ambiente'] ?></option>
        <?php
          $_SESSION['POrt'] = 1;
          endforeach;
        ?>   
      </select>
      <button type="button" onclick="FormBitacoraPASS_TWO()">Confirmar</button>
  </form>

        <!--Completar bitacora-->
<?php else: ?>
  <form id='selectAmbientesBit'>
    <p>Tienes una bitacora por completar en <?php echo $_SESSION['AmbCod']; ?></p>
  <?php
    $_SESSION['POrt'] = 2;
  ?>
    <button type="button" onclick="FormBitacoraPASS_TWO2()">Completar</button>
</form>
<?php endif; ?>
</body>
</html>