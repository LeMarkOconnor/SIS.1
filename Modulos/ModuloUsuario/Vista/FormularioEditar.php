<?php
require ("../../../Modelo/CRUD-OBj.php");

$request = false;
$tablaName = $_GET['tablaName'];
$tablas = null;
$campoPKs = $_GET['CampoPK'];
$valuePKs = $_GET['ValorPK'];
$consultaInner = null;
$datoTablaB = null;
$select = $CRUD->Select($request, $tablaName, $campoPKs, $valuePKs,$consultaInner,$datoTablaB,$tablas); 
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
  <?php  foreach ($select  as $valor):
    ?>
    <form id="FormularioUsuarioEditar">
  <div class="containerEditar">
    <div class="row">
      <div class="col-md-4">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" value='<?php  echo $valor['Usu_Nombre']?>'>
        <input type="hidden" name="campoPK" value='<?php echo $campoPKs?>'>
        <input type="hidden" name="valorPK" value='<?php echo $valuePKs?>'>
      </div>

      <div class="col-md-4">
        <label for="apellido">Apellido:</label>
        <input type="text" name="apellido" value='<?php  echo $valor['Usu_Apellido']?>'>
      </div>

      <div class="col-md-4">
      <label for="activarRolSelect" class="checkbox-label">
          Rol: 
          <input type="checkbox" id="activarRolSelect" onchange="toggleSelectRol(this)" class="checkbox-input"/>
        </label>
        <select id="rolSelect" name="Rol" disabled>
          <?php
          $request = true;
          $tableName = 'tb_rol';
          $campoPK = null; 
          $valuePK = null;
          $select = $CRUD->Select($request, $tableName, $campoPK, $valuePK,$consultaInner,$datoTablaB,$tablas);
          foreach ($select as $row):
          ?>
            <option value="<?php echo $row['Rol_cod']; ?>"><?php echo $row['Rol_Nombre']; ?></option>
          <?php
          endforeach;
          ?>
        </select>
        <input type="hidden" name="Rol_default" id="Rol_hidden" value="<?php echo $valor['Usu_ID_Rol'] ?>">
      </div>
    </div>

    <div class="row">
      <div class="col-md-4">
      <label for="activarTipoId" class="checkbox-label">
        documento de identificación: 
        <input type="checkbox" id="activarTipoId" onchange="toggleSelectTipoId()" class="checkbox-input" />
      </label>
        <select id="tipoIdSelect" name="Tipo_id" disabled>
        <?php
          $tableName = 'tbl_tip_doc';
          $select = $CRUD->Select($request, $tableName, $campoPK, $valuePK,$consultaInner,$datoTablaB,$tablas);
        foreach ($select as $row):
        ?>
            <option value="<?php echo $row['Cod_Tipo_Doc']; ?>"><?php echo $row['NTDoc']; ?></option>
      <?php
        endforeach;
      ?>
        </select>
        <input type="hidden" name="Tipo_id_default" id="Tipo_id_hidden" value="<?php echo $valor['Tipo_id'] ?>">
      </div>

      <div class="col-md-4">
        <label>Número de identificación:</label>
        <input type="text" name="numeroDeIdentificacion" value='<?php  echo $valor['Usu_Nu_ID']?>'>
      </div>

      <div class="col-md-4">
        <label for="NumeroDeTelefono">Número de Teléfono:</label>
        <input type="text" name="NumeroDeTelefono" value='<?Php  echo $valor['Usu_Numero_tele'] ?>'>
        <input type="hidden" name="tableName" value="usuarios">
      </div>
    </div>

    <div class="row">
      <div class="col-md-4">
        <label style="display: block; margin-bottom: 10px;">Subir Imagen:</label>
          <div class="upload-area">
          <i class="fas fa-user fa-2x upload-icon"></i>
          <span class="upload-text">Agregar Fotografía</span>
          <input type="file" name="image" id="imageInput" class="upload-input">
        </div>
      </div>

      <div class="col-md-4">
        <label for="correoElectronico">Correo Electrónico:</label>
        <input type="text" name="correoElectronico" value='<?php  echo $valor['Usu_Correo'] ?>'>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4">
        <br>
        <input type="submit" onclick="UsuarioDatosUpdate(4)" value="Editar" id="EditarBoton">
      </div>
    </div>
    </div>
  </form>
</body>
<script src="../ArchivosJS\Funciones\funcionesSelectsDisable.js"></script>
</html>
    <?php endforeach?>
