<?php  
require ('../../SIS/Modelo/CRUD-OBj.php');
    //Conexion a la base dedatos

    $request = true;
    $tableName = 'reportes';
    $tablas = null;
    $campoPK = null;
    $valuePK = null;
    $datoTablaB = ['Nombre_del_ambiente','Nombre_reporte'];
    $consultaInner = [
        ['reportes.Tipo_Reporte', 'tipo_reporte.Tipo_Reporte'],
        ['reportes.Codigo_del_ambiente', 'ambientes.Codigo_del_ambiente']
    ];
    $tablas = ['tipo_reporte','ambientes'];

    $select = $CRUD->Select($request, $tableName, $campoPK, $valuePK, $consultaInner,$datoTablaB,$tablas); 

?>
<html>
<!--Vista de novedades-->

<div class="row justify-content-end">
    <div class="col-sm-9">
        <h3 class="titulo">Novedades</h3>
        <div class="Novedades p-3 rounded-end">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <?php
                $campoPK = 'Num_Reporte';
                foreach ($select as $key => $value):
                    $valorPK = $value['Num_Reporte'];
                ?>
                        <div class="col mb-3">
                            <div class="cuadro bg-white p-2 rounded">
                                <h5 class="minititulo"><?php echo $value['Nombre_reporte']; ?></h5>
                                <div class="contenido"><?php echo $value['Nombre_del_ambiente']; ?></div>
                                <a href="#" class="ver-detalle" onclick='MostrarDetalles("<?php echo $valorPK ?>", "<?Php echo $campoPK ?>")'>Ver Detalle</a>
                            </div>
                        </div>
                <?php
                    endforeach;
                ?>
            </div>
        </div>
    </div>
</div>

<style>

.cuadro 
{
    height: 100px;
    width: 250px;
    background-color: #ccc;
    margin-bottom: 10px; 
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 10px;
    border-radius: 5px;
    display: flex; 
    flex-direction: column; 
}

.minititulo 
{
    margin-bottom: 5px; 
    font-size: 15px;
}

.contenido 
{
    font-size: 22px;
}


.cuadro h5, .cuadro .contenido 
{
    margin: 0; 
}

.minititulo,
.contenido 
{
    color: black;
    margin-bottom: 5px; 
}

.ver-detalle 
{
    color: blue;
    margin-top: auto; 
}
.Novedades 
{
    margin-top: 50px;
    margin-bottom: 50px;
    background-color: #cce5ff;
    max-height: 500px;
    overflow-y: auto;
}
.titulo 
{
    margin-top: 20px;
    margin-bottom: -30px;
    text-align: center;
    height: 50px;
    background-color: #cce5ff;
}

</style>

</html>