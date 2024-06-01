<?php
    //Conexion a la base dedatos
    require ("../../../../SIS/Modelo/CRUD-OBj.php");
    if(isset($_GET['posicion']))
    {
        if($_GET['posicion'] == 2)
        {
            $request = false;
            $tableName = 'reportes';
            $valuePK = $_GET['ValorPK'];
            $campoPK = $_GET['CampoPK'];
            $datoTablaB = ['Nombre_del_ambiente','Nombre_reporte','Tipo_Nombre'];
            $consultaInner = [
                ['reportes.Tipo_Elemento_cod', 'tipo_elemento.Tipo_Elemento_cod'],
                ['reportes.Tipo_Reporte', 'tipo_reporte.Tipo_Reporte'],
                ['reportes.Codigo_del_ambiente', 'ambientes.Codigo_del_ambiente']
            ];
            $tablas = ['tipo_elemento','tipo_reporte','ambientes'];
        
            $select = $CRUD->Select($request, $tableName, $campoPK, $valuePK, $consultaInner,$datoTablaB,$tablas);
        }
    }

?>