<?php
//incluir la logica con la consulta
include ('../Logica/logica.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="PreBitacora.css">
    <title>Document</title>
</head>
<style>
.correcto {
    color: green;
}
.incorrecto {
    color: red;
}

.desbloqueado {
    background-color: #4caf50;
    margin-left: 100px;
    margin-right: 100px;
}

.bloqueado {
    background-color: #ccc;
    margin-left: 100px;
    margin-right: 100px;
}
.inputs-container {
    display: flex;
    flex-wrap: wrap;
}

.input-wrapper {
    flex: 1 1 auto;
    margin-right: 20px;
}

.raya
{
    border: none; 
    height: 3px; 
    background-color: #333; 
    margin: 20px 0; 
    box-shadow: 0 2px 2px rgba(0, 0, 0, 0.1); 
}

.boton-container {
    display: flex; 
    justify-content: space-between; 
}

</style>
<body>
<table>
        <tr>
            <th>Cantidad Portatiles:</th>
            <th>Cantidad Cargadores:</th>
            <th>Cantidad Mouse:</th>
            <th>Cantidad Mesas:</th>
            <th>Cantidad Sillas:</th>
            <th>A</th>
        </tr>
    <?php 
   if ($_SESSION['POrt'] == 1): ?>
    <form id="formbitacora">
        <tr>
            <td> <input type="text" name="cantPortatiles" id="cantPortatiles" oninput="compararValor('cantPortatiles', <?php echo $portatiles['contarPortatiles']; ?>, 'portatilesCheck', 'confirmButton')">    </td>
            <td> <input type="text" name="cantCargadores" id="cantCargadores" oninput="compararValor('cantCargadores', <?php echo $cargadores['contarCargadores']; ?>, 'cargadoresCheck', 'confirmButton')"></td>
            <td> <input type="text" name="cantMouse" id="cantMouse" oninput="compararValor('cantMouse', <?php echo $mouses['contarMouse']; ?>, 'mouseCheck', 'confirmButton')"></td>
            <td> <input type="text" name="cantMesas" id="cantMesas" oninput="compararValor('cantMesas', <?php echo $mesas['contarMesas']; ?>, 'mesasCheck', 'confirmButton')"></td>
            <td> <input type="text" name="cantSillas" id="cantSillas" oninput="compararValor('cantSillas', <?php echo $sillas['contarSillas']; ?>, 'sillasCheck', 'confirmButton')"></td>
            <td> <span id="allCheck" class="check"><i class="fas fa-check"></i></span></p></td>
        </tr>
        </table>
    <div class="boton-container">
        <input type="button" value="Confirmar" id="confirmButton" class="bloqueado" onclick="FormBitacora()" disabled>
        <input type="button" value="Reportar" id="reportarButton" class="bloqueado" onclick="ReportBitacora('<?php echo $_SESSION['AmbCod']?>')" disabled>
    </div>
        </form>

    <?php elseif ($_SESSION['POrt'] == 2): ?>
        <form id="formbitacora">
            <?php foreach ($selectBitaIncom as $BitaIncom): ?>
                <?php $codBita = $BitaIncom['id_bitacora']; ?>
            <?php endforeach ?>
            <td> <input type="text" name="poscantPortatiles" id="cantPortatiles" oninput="compararValor('cantPortatiles', <?php echo $portatiles['contarPortatiles']; ?>, 'portatilesCheck', 'confirmButton')">    </td>
            <td> <input type="text" name="poscantCargadores" id="cantCargadores" oninput="compararValor('cantCargadores', <?php echo $cargadores['contarCargadores']; ?>, 'cargadoresCheck', 'confirmButton')"></td>
            <td> <input type="text" name="poscantMouse" id="cantMouse" oninput="compararValor('cantMouse', <?php echo $mouses['contarMouse']; ?>, 'mouseCheck', 'confirmButton')"></td>
            <td> <input type="text" name="poscantMesas" id="cantMesas" oninput="compararValor('cantMesas', <?php echo $mesas['contarMesas']; ?>, 'mesasCheck', 'confirmButton')"></td>
            <td> <input type="text" name="poscantSillas" id="cantSillas" oninput="compararValor('cantSillas', <?php echo $sillas['contarSillas']; ?>, 'sillasCheck', 'confirmButton')"></td>
            <td> <span id="allCheck" class="check"><i class="fas fa-check"></i></span></p></td>
        </table>
        <div class="boton-container">
            <input type="button" value="Confirmar" id="confirmButton" class="bloqueado" onclick="FormBitacoraUpdate(<?php echo $codBita ?>)" disabled>
            <input type="button" value="Reportar" id="reportarButton" class="bloqueado" onclick="ReportBitacora('<?php echo $_SESSION['AmbCod']?>')" disabled>
        </div>
        </form>
    <?php endif; ?>

    <hr class="raya">    
    <h5>Elementos asignados al aula disponibles</h5>
    <div class="inputs-container">
        <!-- Portatiles -->
        <div class="input-wrapper">
            <p>Portatiles Actualmente: 
            <?php echo $portatiles['contarPortatiles']; ?>
            <span id="portatilesCheck" class="check"><i class="fas fa-check"></i></span></p>
        </div>

        <!-- Cargadores -->
        <div class="input-wrapper">
            <p>Cargadores Actualmente: 
            <?php echo $cargadores['contarCargadores']; ?>
            <span id="cargadoresCheck" class="check"><i class="fas fa-check"></i></span></p>
        </div>

        <!-- Mouse -->
        <div class="input-wrapper">
            <p>Mouse Actualmente:
            <?php echo $mouses['contarMouse']; ?>
            <span id="mouseCheck" class="check"><i class="fas fa-check"></i></span></p>
        </div>

        <!-- Mesas -->
        <div class="input-wrapper">
            <p>Mesas Actualmente:
            <?php echo $mesas['contarMesas']; ?>
            <span id="mesasCheck" class="check"><i class="fas fa-check"></i></span></p>
        </div>

        <!-- Sillas -->
        <div class="input-wrapper">
            <p>Sillas Actualmente:
            <?php echo $sillas['contarSillas']; ?>
            <span id="sillasCheck" class="check"><i class="fas fa-check"></i></span></p>
        </div>
    </div>


    <script>
function compararValor(inputId, valorActual, checkId, buttonId) {
    const inputValue = document.getElementById(inputId).value;//Valor recibido en la funcion
    const checkElement = document.getElementById(checkId);//Todos los checks
    const buttonElement = document.getElementById(buttonId);
    const allCheckElement = document.getElementById("allCheck");//Check universal


    if (inputValue === String(valorActual)) {
        //Para el check final
        allCheckElement.innerHTML = '<i class="fas fa-check"></i>';
        allCheckElement.classList.remove('incorrecto');
        allCheckElement.classList.add('correcto');
        //Para todos los checks
        checkElement.innerHTML = '<i class="fas fa-check"></i>';
        checkElement.classList.remove('incorrecto');
        checkElement.classList.add('correcto');

    }else {
        //Para el check final
        allCheckElement.innerHTML = '<i class="fas fa-times"></i>';
        allCheckElement.classList.add('incorrecto');
        allCheckElement.classList.remove('correcto');
        //Para todos los checks
        checkElement.innerHTML = '<i class="fas fa-times"></i>';
        checkElement.classList.remove('correcto');
        checkElement.classList.add('incorrecto');
    } 

    const incorrectos = document.querySelectorAll('.incorrecto');
    buttonElement.disabled = incorrectos.length > 0;
    buttonElement.classList.toggle('bloqueado', incorrectos.length > 0);
    buttonElement.classList.toggle('desbloqueado', incorrectos.length === 0);

    const reportarButton = document.getElementById('reportarButton');
    reportarButton.disabled = !buttonElement.disabled;
    reportarButton.classList.toggle('bloqueado', !buttonElement.disabled);
    reportarButton.classList.toggle('desbloqueado', buttonElement.disabled);
}

    </script>
    </body>
    </html>
