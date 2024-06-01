<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body>
<style>
    /* Busqueda */
#ListaUsuarios_filter input[type="search"] {
    border: 1px solid blue !important; 
    background-color: white !important;
    border-radius: 4px;
    padding: 6px 12px;
}
/* Select */
#ListaUsuarios_length select {
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
#ListaUsuarios_info {
    color: white;;
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
    ?>
        <table id="ListaUsuarios" class="display">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Tarjeta identificación</th>
                    <th>Número Identificación</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th>Rol</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($select as $value) { 
                    $campoPK = 'Usu_id';
                    $valorPK = $value['Usu_id'];
                ?>
                    <tr>
                        <td><?php echo $value['Usu_Nombre']; ?></td>
                        <td><?php echo $value['Usu_Apellido']; ?></td>
                        <td><?php echo $value['NTDoc']; ?></td>
                        <td><?php echo $value['Usu_Nu_ID']; ?></td>
                        <td><?php echo $value['Usu_Correo']; ?></td>
                        <td><?php echo $value['Usu_Numero_tele']; ?></td>
                        <td><?php echo $value['Rol_nombre']; ?></td>
                        <td>
                            <button class="EditarUsuario" onclick="consultarParaEditarUsuario('<?php echo $campoPK; ?>', '<?php echo $valorPK; ?>', '<?php echo $tableName; ?>', 4)">Editar</button>
                        </td>
                        <?php if ($value['Usu_Status'] == 'Alta'): ?>
                            <td>
                                <button class="EliminarUsuario" onclick="eliminarRegistroUsuario('<?php echo $campoPK; ?>', '<?php echo $valorPK; ?>', '<?php echo $tableName; ?>', 3, 'Baja')">Desabilitar</button>
                            </td>
                        <?php elseif ($value['Usu_Status'] == 'Baja'): ?>
                            <td>
                                <button class="EliminarUsuario" onclick="eliminarRegistroUsuario('<?php echo $campoPK; ?>', '<?php echo $valorPK; ?>', '<?php echo $tableName; ?>', 3, 'Alta')">Habilitar</button>
                            </td>
                        <?php endif; ?>
                        </tr>
                <?php } ?>
            </tbody>
        </table>
    <?php
    ?>
    </div>
    <script>
$(document).ready(function() {
    // Inicializar DataTable con paginación, búsqueda y configuración de idioma
    $('#ListaUsuarios').DataTable({
        language: {
            url: '//cdn.datatables.net/plug-ins/2.0.8/i18n/es-MX.json'
        }
    });
});
    </script>
</body>
</html>