<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../ArchivosCSS\ModuloCSS\Usuario/AgregarUsuario.css">
    <title>Document</title>
</head>
<body>
<form id="FormularioUsuarioInsertar">
  <div id="containerAgregar">
    <div class="row">
      <div class="col-md-4">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre">
      </div>

      <div class="col-md-4">
        <label for="apellido">Apellido:</label>
        <input type="text" id="apellido" name="apellido">
      </div>

      <div class="col-md-4">
        <label>Rol:</label>
        <select id="rolSelect" name="Rol">
        <?php
        require ("../../../Modelo/CRUD-OBj.php");
          $request = true;
          $tableName = 'tb_rol';
          $tablas = null;
          $campoPK = null; 
          $valuePK = null;
          $datoTablaB = null;
          $consultaInner = null;
          $select = $CRUD->Select($request, $tableName, $campoPK, $valuePK,$consultaInner,$datoTablaB,$tablas);
        foreach ($select as $row):
        ?>
            <option value="<?php echo $row['Rol_cod']; ?>"><?php echo $row['Rol_Nombre']; ?></option>
      <?php
        endforeach;
      ?>
        </select>
      </div>
    </div>

    <div class="row">
      <div class="col-md-4">
      <label>Tipo documento:</label>
        <select id="tipoDocumento" name="Tipo_id">
        <?php
          $request = true;
          $tableName = 'tbl_tip_doc';
          $tablas = null;
          $select = $CRUD->Select($request, $tableName, $campoPK, $valuePK,$consultaInner,$datoTablaB,$tablas);
        foreach ($select as $row):
        ?>
            <option value="<?php echo $row['Cod_Tipo_Doc']; ?>"><?php echo $row['NTDoc']; ?></option>
      <?php
        endforeach;
      ?>
        </select>
      </div>

      <div class="col-md-4">
        <label>Número de identificación:</label>
        <input type="text" name="numeroDeIdentificacion">
      </div>

      <div class="col-md-4">
        <label for="NumeroDeTelefono">Número de Teléfono:</label>
        <input type="text" name="NumeroDeTelefono">
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
        <input type="text" name="correoElectronico">
      </div>
    </div>
    <div class="row">
      <div class="col-md-4">
        <br>
        <input type="submit" onclick="InsertarUsuario(1)" value="Agregar" id="AgregarBoton">
      </div>
    </div>
    </div>
  </form>

</body>
</html>
</html>
