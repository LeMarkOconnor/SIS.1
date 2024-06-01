<?php  
 require ("../../../Modelo/CRUD-OBj.php");
 $request = true;
 $tableName = 'bitacora';
 $tablas = null;
 $campoPK = null; 
 $valuePK = null;
 $datoTablaB = null;
 $consultaInner = null;
 $select = $CRUD->Select($request, $tableName, $campoPK, $valuePK,$consultaInner,$datoTablaB,$tablas);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
    <script>
                $(document).ready(function() {
            // Inicializar DataTable con paginación y búsqueda
            $('#tabla_usuarios').DataTable({
                "paging": true,
                "searching": true
            });
        });
    </script>
    <title>Document</title>
</head>
<body>
<table>
            <thead>
                <tr>
                    <th>ID</th>
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
                        <td><?php echo $value['Usu_id']; ?></td>
                        <td><?php echo $value['Usu_Nombre']; ?></td>
                        <td><?php echo $value['Usu_Apellido']; ?></td>
                        <td><?php echo $value['NTDoc']; ?></td>
                        <td><?php echo $value['Usu_Nu_ID']; ?></td>
                        <td><?php echo $value['Usu_Correo']; ?></td>
                        <td><?php echo $value['Usu_Numero_tele']; ?></td>
                        <td><?php echo $value['Rol_nombre']; ?></td>
                        </tr>
                <?php } ?>
            </tbody>
        </table>
</body>
</html>