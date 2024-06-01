<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../ArchivosCSS\ModuloCSS\Usuario/ModuloUsuario.css">
    <title>Insertar ambientes</title>
</head>
<body>
<form id="FormularioInsertartAmbientes">
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <label for="apellido">Nombre del ambiente</label>
        <input type="text" id="NomAmbiente" name="NomAmbiente">
      </div>
    </div>
  
    <div class="row">
      <div class="col-md-4">
        <label>Fecha de activacion</label>
          <input type="date" id="DateActivation" name="DateActivation">
      </div>

      <div class="col-md-4">
        <label>Usado por ultima vez</label>
        <input type="date" name="LastTimeUse">
      </div>

    </div>

    <div class="row">
      <div class="col-md-4">
        <br>
        <input type="hidden" value="ambientes" id="tableName" name="tableName">
        <input type="submit" onclick="InsertarAmbiente(8)" value="Agregar">
      </div>
    </div>
    
    </div>
  </form>

</body>
</html>
</html>