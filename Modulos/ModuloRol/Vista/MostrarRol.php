<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<style>
    /* Busqueda */
#ListaRol_filter input[type="search"] {
    border: 1px solid blue !important; 
    background-color: white !important;
    border-radius: 4px;
    padding: 6px 12px;
}
/* Select */
#ListaRol_length select {
    border: 1px solid blue !important; 
    border-radius: 4px;
    padding: 6px 12px;
    background-color: white !important; 
}
.dataTables_length label,
.dataTables_filter label
{
    color: white;
}

/* Anular el estilo para el texto en las celdas de encabezado y de datos */
th, td {
    color: initial;
}

/* Estilo para el texto de búsqueda */
.dataTables_filter input {
    color: black; 
}

/* Estilo para el número dentro del select */
.dataTables_length select {
    color: black;
}
.dataTables_length select option {
    color: black;
}
/* Estilo para el texto de la información de paginación */
#ListaRol_info {
    color: white;
}
.EliminarUsuario,
.EditarUsuario{
    color: black;
}
.paginate_button.previous, 
.paginate_button.next {
    background-color: white !important; /* Importante */
    color: black !important; /* Importante */
    border: 1px solid #ADD8E6 !important; /* Importante */
    border-radius: 5px !important; /* Importante */
    padding: 5px 10px !important; /* Importante */
    margin: 0 5px !important; /* Importante */
}
/* Estilo para los th */
th {
    background-color: #ADD8E6; /* Fondo azul claro */
}
</style>
    <div class="container">

    <?php
    include ('../Logica/Logica.php'); 
   if (!empty($selectRol)) {
    ?>
        <table id="ListaRol">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($selectRol as $value) { 
                    // Captura campoPK y ValorPK
                    $campoPK = key($value);
                    $valorPK = current($value);
                ?>
                    <tr>
                        <?php foreach ($value as $values): ?>
                            <td><?php echo $values; ?></td>
                        <?php endforeach; ?>
                        <td>
                            <button class="EditarRol" onclick="consultarParaRol('<?php echo $campoPK; ?>', '<?php echo $valorPK; ?>', '<?php echo $tablaNombre; ?>', 4)">Editar</button>
                        </td>
                        <td>
                            <button class="EliminarRol" onclick="eliminarRegistroRol('<?php echo $campoPK; ?>', '<?php echo $valorPK; ?>', '<?php echo $tablaNombre; ?>', 3)">Eliminar</button>
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
    <script>
$(document).ready(function() {
    // Inicializar DataTable con paginación, búsqueda y configuración de idioma
    $('#ListaRol').DataTable({
        language: {
            url: '//cdn.datatables.net/plug-ins/2.0.8/i18n/es-MX.json'
        }
    });
});
    </script>
</body>
</html>