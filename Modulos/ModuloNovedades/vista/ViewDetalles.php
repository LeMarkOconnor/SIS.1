<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
require ('../logica/Logica.php');
    ?>

    <style>
        .modal-bodyMostrarDetalle{
            background-color: #2898cc;
        }
        .datoArray {
            color: black;
            font-weight: bold;
        }
        .mini-titulo {
            font-weight: bold;
            color: white;
        }
        .text-center {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php foreach ($select as $value) { ?>
            <div class="row">
                <div class="col-md-6 text-center">
                    <p class="mini-titulo">Razon del reporte:</p>
                    <p class='datoArray'><?php echo $value['Nombre_reporte']; ?></p>
                </div>
                <div class="col-md-6 text-center">
                    <p class="mini-titulo">Numero de ambiente:</p>
                    <p class='datoArray'><?php echo $value['Nombre_del_ambiente']; ?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 text-center">
                    <p class="mini-titulo">Tipo de elemento:</p>    
                    <p class='datoArray'><?php echo $value['Tipo_Nombre']; ?></p>
                </div>
                <div class="col-md-6 text-center">
                    <p class="mini-titulo">Numero de serie:</p>    
                    <p class='datoArray'><?php echo $value['Num_de_serie']; ?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <p class="mini-titulo">Descripcion:</p>    
                    <p class='datoArray'><?php echo $value['Descripcion']; ?></p>
                </div>
            </div>
        <?php } ?>
    </div>
</body>
</html>


</body>
</html>