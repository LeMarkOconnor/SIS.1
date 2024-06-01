<?php 

include ('../Logica/Logica.php'); 

?>

<style>
  .checkbox-pequeno {
    transform: scale(0.5);
  }
</style>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!---Collapse portatiles--->
    <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapsePortatiles" aria-expanded="false" aria-controls="collapseExample">
    Portátiles
    </button>
<div class="collapse" id="collapsePortatiles">
    <div class="card card-body">
        <?php 
        foreach ($selectPortatiles as $portatiles):?>
            <p for="miCheckbox">Marca: <?php echo $portatiles['marca']?> Serial: <?php echo $portatiles['serial']?> Tipo de elemento: <?php echo $portatiles['Tipo_Nombre']?></p>
            <input type="checkbox" id="miCheckbox" class="checkbox-pequeno">
        <?php endforeach; ?>
    </div>
</div>

<!---------------------------------------------------------->

    <!---Collapse portatiles--->
    <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseCargadores" aria-expanded="false" aria-controls="collapseExample">
    Cargadores
    </button>
<div class="collapse" id="collapseCargadores">
    <div class="card card-body">
        <?php 
        foreach ($selectCargadores as $cargadores):?>
            <label for="miCheckbox">Marca: <?php echo $cargadores['marca']?> Serial: <?php echo $cargadores['serial']?> Tipo de elemento: <?php echo $cargadores['Tipo_Nombre']?></label>
            <input type="checkbox" id="miCheckbox" class="checkbox-pequeno">
        <?php endforeach; ?>
    </div>
</div>

<!---------------------------------------------------------->


</body>
</html>