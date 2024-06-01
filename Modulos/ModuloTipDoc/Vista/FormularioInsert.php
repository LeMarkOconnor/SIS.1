<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../ArchivosCSS\ModuloCSS\TipoDocumento/AgregarTipoDocumento.css">
    <title>Insertar ambientes</title>
</head>
<body>
<form id="FormularioInsertarDoc">
  <div class="containerAgregar">
    <div class="row">
      <div class="col-md-4">
        <label for="apellido">Nombre del Documento</label>
        <input type="text" id="NomDoc" name="NomDoc">
      </div>
  
      <div class="col-md-4">
        <label>Descripcion</label>
          <input type="text" id="DescDoc" name="DescDoc">
      </div>
    </div>

    <div class="row">
      <div class="col-md-4">
        <br>
        <input type="hidden" value="tbl_tip_doc" id="tableName" name="tableName">
        <input type="submit" onclick="InsertarDoc(8)" value="Agregar">
      </div>
    </div>
    </div>
  </form>
</body>
</html>
</html>