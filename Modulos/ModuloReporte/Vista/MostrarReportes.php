<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../ArchivosCSS\ModuloCSS\Usuario/MostrarUsuarios.css">
</head>
<body>
    <div class="container">
    <style>
    /* Busqueda */
#ListaReporte_filter input[type="search"] {
    border: 1px solid blue !important; 
    background-color: white !important;
    border-radius: 4px;
    padding: 6px 12px;
}
/* Select */
#ListaReporte_length select {
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
#ListaReporte_info {
    color: white;;
}
.EditarReporte{
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
    <?php
    include ('../Logica/Logica.php'); 
    ?>
        <table id="ListaReporte">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tipo de reporte</th>
                    <th>Tipo de elemento</th>
                    <th>Serial</th>
                    <th>Codigo del ambiente</th>
                    <th>Descripcion</th>
                    <th>Editar</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($select as $value) { 
                    $campoPK = 'Num_Reporte';
                    $valorPK = $value['Num_Reporte'];
                ?>
                    <tr>
                        <td><?php echo $value['Num_Reporte']; ?></td>
                        <td><?php echo $value['Nombre_Reporte']; ?></td>
                        <td><?php echo $value['Tipo_Nombre']; ?></td>
                        <td><?php echo $value['Num_de_serie']; ?></td>
                        <td><?php echo $value['Nombre_del_ambiente']; ?></td>
                        <td><?php echo $value['Descripcion']; ?></td>
                        <td>
                            <button class="EditarReporte" onclick="consultarParaEditarReporte('<?php echo $campoPK; ?>', '<?php echo $valorPK; ?>', '<?php echo $tableName; ?>', 4)">Editar</button>
                        </td>
                        </tr>
                <?php } ?>
            </tbody>
        </table>
    <?php
    ?>
    </div>
</body>
</html>