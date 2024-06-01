<?php

if(isset($_POST['accion']) && $_POST['accion'] == 'AmbientesBit')
{
    include ('../vista/formularioAmbientes.php');
}
elseif(isset($_POST['accion']) && $_POST['accion'] == 'BitacoraV1')
{
    include ('../vista/formularioPreBitacora.php');
}
elseif(isset($_POST['accion']) && $_POST['accion'] == 'BitacoraInsert')
{
    include ('../logica/logica.php');
}
elseif(isset($_POST['accion']) && $_POST['accion'] == 'BitacoraUpdate')
{
    include ('../logica/logica.php');
}




?>