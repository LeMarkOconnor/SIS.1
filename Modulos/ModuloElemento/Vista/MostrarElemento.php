<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<style>
    /* Busqueda */
#ListaTipoElemento_filter input[type="search"] {
    border: 1px solid blue !important; 
    background-color: white !important;
    border-radius: 4px;
    padding: 6px 12px;
}
/* Select */
#ListaTipoElemento_length select {
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
#ListaTipoElemento_info {
    color: white;;
}
.EditarTipoElemento,
.EliminarTipoElemento{
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
if (!empty($selectElemento)) {
    ?>
        <table id="ListaTipoElemento">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Marca</th>
                    <th>Serial</th>
                    <th>Ambiente</th>
                    <th>Tipo de elemento</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($selectElemento as $value) { 
                    // Captura campoPK y ValorPK
                    $campoPK = key($value);
                    $valorPK = current($value);
                ?>
                    <tr>
                            <td><?php echo $value['elemento_id']; ?></td>
                            <td><?php echo $value['marca']; ?></td>
                            <td><?php echo $value['serial']; ?></td>
                            <td><?php echo $value['ambiente']; ?></td>
                            <td><?php echo $value['Tipo_Nombre']; ?></td>
                        <td>
                            <button class="EditarTipoElemento" onclick="consultarParaElemento('<?php echo $campoPK; ?>', '<?php echo $valorPK; ?>', '<?php echo $tablaNombre; ?>', 4)">Editar</button>
                        </td>
                        <td>
                            <button class="EliminarTipoElemento" onclick="eliminarRegistroElemento('<?php echo $campoPK; ?>', '<?php echo $valorPK; ?>', '<?php echo $tablaNombre; ?>', 3)">Eliminar</button>
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
            // Inicializar DataTable con paginación y búsqueda
            $('#ListaTipoElemento').DataTable();
        });
    </script>
</body>
</html>