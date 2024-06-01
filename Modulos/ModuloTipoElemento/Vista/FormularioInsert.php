<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../ArchivosCSS\ModuloCSS\TipoElemento/AgregarTipoElemento.css">
    <title>Document</title>
</head>
<body>
<form id="FormularioElementoInsertar">
  <div id="containerAgregar">
    <div class="row">
      <div class="col-md-4">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre">
      </div>

      <div class="col-md-4">
        <label for="apellido">Descripcion:</label>
        <input type="text" id="descripcion" name="descripcion">
        <input type="hidden" name="tablaNombre" value="tipo_elemento">
      </div>
     
    <div class="row">
      <div class="col-md-4">
        <br>
        <input type="submit" onclick="InsertarTipoElemento(1)" value="Agregar" id="AgregarBoton">
      </div>
    </div>
  </div>
</form>
</body>
</html>
