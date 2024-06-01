<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../ArchivosCSS\ModuloCSS\TipoElemento/MostrarTipoElemento.css">
</head>
<body>
    <div class="container">
<?php  
$labels = array(
    "Tipo_Elemento_cod" => "ID",
    "Tipo_Nombre" => "Nombre",
);
?>
<!-- Consulta -->
<form id="consultaSelect">
    <div id="valorConsultaContainer">
        <input type="text" name="valorConsulta" id="valorConsulta" placeholder="Valor a buscar">
    </div>
    <!-- Filtro de búsqueda -->
    <div id="campoContainer">
        <select name="campo" id="campo">
            <?php foreach ($labels as $campo => $value): ?>
                <option value="<?php echo $campo; ?>"><?php echo $value; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <!--------->
    <button type="button" id="Buscar" onclick="ConsultaTipoElemento(2)">Buscar</button>
    <a href="#" id="Limpiar" onclick="mostrarTipoElemento(2)">Limpiar</a>
</form>

    <?php
    include ('../Logica/Logica.php'); 
if (!empty($selectTipoDocumento)) {
    ?>
        <table id="ListaTipoElemento">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>descripcion</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($selectTipoDocumento as $value) { 
                    // Captura campoPK y ValorPK
                    $campoPK = key($value);
                    $valorPK = current($value);
                ?>
                    <tr>
                        <?php foreach ($value as $values): ?>
                            <td><?php echo $values; ?></td>
                        <?php endforeach; ?>
                        <td>
                            <button class="EditarTipoElemento" onclick="consultarParaTipoElemento('<?php echo $campoPK; ?>', '<?php echo $valorPK; ?>', '<?php echo $tablaNombre; ?>', 4)">Editar</button>
                        </td>
                        <td>
                            <button class="EliminarTipoElemento" onclick="eliminarRegistroTipoElemento('<?php echo $campoPK; ?>', '<?php echo $valorPK; ?>', '<?php echo $tablaNombre; ?>', 3)">Eliminar</button>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    <?php
    } else {
        echo "<p id='NoResultados'>No se encontraron resultados.</p>";
    }
    ?>
    </div>
</body>
</html>