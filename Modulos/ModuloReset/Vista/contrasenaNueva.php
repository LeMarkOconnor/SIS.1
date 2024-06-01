<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../ArchivosCSS\ModuloCSS\ActualizarContraseña\ActualizarContrasena.css">
    <title>Document</title>
</head>
<body>
    <div class="containerresetPassWord">
        <h1>Actualizar Contraseña</h1>
        <form id="resetPassWord">
        <label for="conNueva" id="labelConNueva">Nueva Contraseña:</label>
            <input type="password" name="conNueva" id="conNueva">
        <label for="conNuevaTwo" id="labelConNuevaTwo">Repite la Nueva Contraseña:</label>
            <input type="password" name="conNuevaTwo" id="conNuevaTwo">
            <input type="hidden" name="Reset" id="Reset" value='<?php echo $_GET["correo"]?>'>
            <input type="button" value="Guardar" id="guardarBtn" onclick="ContrasenaNueva()">
        </form>
    </div>
</body>
</html>