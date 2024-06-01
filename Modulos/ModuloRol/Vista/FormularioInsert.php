<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../ArchivosCSS\ModuloCSS\Rol/AgregarRol.css">
</head>
<body>
<form id="FormularioRolInsertar">
  <div id="containerAgregar">
    <div class="row">
      <div class="col-md-4">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre">
      </div>

      <div class="col-md-8">
        <label for="apellido">Descripcion</label>
        <input type="text" name="descripcion">
        <input type="hidden" name="tableName" value="tb_rol">
      </div>

    <div class="row">
      <div class="col-md-4">
        <br>
        <input type="submit" onclick="InsertarRol(1)" value="Agregar" id="AgregarBoton">
      </div>
    </div>
    </div>
  </form>

</body>
</html>


</html>
