<?php
require ("../../../Modelo/CRUD-OBj.php");
session_start();

if(isset($_POST['process']))
{
    $consult = $_POST['process'];

    //Primera consulta Ambientes
    if($consult == 'selectAmbientes')
    {
        $request = true;
        $tablaNombre = "ambientes";
        $campoPK = NULL;
        $valuePK = NULL;
        $consultaInner = NULL;
        $datoTablaB = NULL;
        $tablas = null;
        $selectAmbientes = $CRUD->Select($request, $tablaNombre, $campoPK, $valuePK, $consultaInner,$datoTablaB,$tablas);
    }
    //Segunda consulta Elementos
    elseif($consult == 'selectCountElementsV1')
    {
        if(isset($_POST['ambientes'])){
            $_SESSION['AmbCod'] = $_POST['ambientes'];
            echo $_SESSION['AmbCod'];
        }
        $campoPK = ['tipo_elemento.Tipo_Elemento_cod','elemento.ambiente'];
        $consultaInner = 
        [
            ['ambientes.Codigo_del_ambiente','elemento.ambiente'],
            ['tipo_elemento.Tipo_Elemento_cod','elemento.tipo_elemento_cod']
        ];
        $tablas = ['ambientes','tipo_elemento'];

        //Consulta de portatiles
        $nombreTabla = $_POST['nameTable'];
        $request = 'WHERE';
        $valorPK = [2,isset($_POST['ambientes'])? $_POST['ambientes'] : $_SESSION['AmbCod']];//cambiar a el valor del aula 

        $datoTablaB = ['count(elemento.elemento_id) as contarPortatiles'];

        $selectPortatiles = $CRUD->select($request, $nombreTabla, $campoPK, $valorPK, $consultaInner, $datoTablaB,$tablas);
        //=========================================================================

        //Consulta de cargadores
        $request = 'WHERE';
        $valorPK = [3,isset($_POST['ambientes'])? $_POST['ambientes'] : $_SESSION['AmbCod']];//cambiar a el valor del aula 

        $datoTablaB = ['count(elemento.elemento_id) as contarCargadores'];

        $selectCargadores = $CRUD->select($request, $nombreTabla, $campoPK, $valorPK, $consultaInner, $datoTablaB,$tablas);
        //=========================================================================

        //Consulta de mesas
        $request = 'WHERE';
        $valorPK = [4,isset($_POST['ambientes'])? $_POST['ambientes'] : $_SESSION['AmbCod']];//cambiar a el valor del aula 

        $datoTablaB = ['count(elemento.elemento_id) as contarMesas'];

        $selectMesas = $CRUD->select($request, $nombreTabla, $campoPK, $valorPK, $consultaInner, $datoTablaB,$tablas);
        //=========================================================================

        //Consulta de sillas
        $request = 'WHERE';
        $valorPK = [5,isset($_POST['ambientes'])? $_POST['ambientes'] : $_SESSION['AmbCod']];//cambiar a el valor del aula 

        $datoTablaB = ['count(elemento.elemento_id) as contarSillas'];

        $selectSillas = $CRUD->select($request, $nombreTabla, $campoPK, $valorPK, $consultaInner, $datoTablaB,$tablas);
        //=========================================================================

        //Consulta de mouses
        $request = 'WHERE';
        $valorPK = [6,isset($_POST['ambientes'])? $_POST['ambientes'] : $_SESSION['AmbCod']];//cambiar a el valor del aula 

        $datoTablaB = ['count(elemento.elemento_id) as contarMouse'];

        $selectMouse = $CRUD->select($request, $nombreTabla, $campoPK, $valorPK, $consultaInner, $datoTablaB,$tablas);
        //=========================================================================

        //=========Recorrer arreglos=========

        //Traer para portatiles
        foreach ($selectPortatiles as $portatiles) 
        {
        $portatiles['contarPortatiles'];
        }
        //Traer para cargadores
        foreach($selectCargadores as $cargadores)
        {
        $cargadores['contarCargadores'];
        }
        //Traer para mouses
        foreach($selectMouse as $mouses)
        {
        $mouses['contarMouse'];
        }
        //Traer para mesas
        foreach($selectMesas as $mesas)
        {
        $mesas['contarMesas'];
        }
        //Traer para mouses
        foreach($selectSillas as $sillas)
        {
        $sillas['contarSillas'];
        }
        if($_SESSION['POrt'] == 2)
        {
            $request = false;
            $tableName = 'bitacora';
            $campoPK = 'estado'; 
            $valuePK = 'incompleto';
            $datoTablaB = null;
            $consultaInner = null;
            $tablas = null;
            $selectBitaIncom = $CRUD->Select($request, $tableName, $campoPK, $valuePK, $consultaInner, $datoTablaB,$tablas);

        }
        //====================================================================================
        //====================================================================================
    }

    if($consult == 'insertBita')
    {
    //Nombre Tabla
    $tablaNombre = $_POST['tablaname'];
    //Datos Usuarios
    $cantPortatiles = $_POST['cantPortatiles'];
    $cantCargadores = $_POST['cantCargadores'];
    $cantMouses = $_POST['cantMouse'];
    $cantMesas = $_POST['cantMesas'];
    $cantSillas = $_POST['cantSillas'];
    echo $_SESSION['AmbCod'];

    // Obtiene la fecha actual
    $fechaActual = date('Y-m-d');

    // Obtiene la hora actual
    $horaActual = date('H:i:s');
        

    $campos = ["Usu_ID","fecha","Hora_Inicial","pre_cant_port","pre_cant_carg","pre_cant_mouse","pre_cant_mesas","pre_cant_sillas","estado","Codigo_del_ambiente"];
    $values = [$_SESSION['ID'],$fechaActual,$horaActual,$cantPortatiles,$cantCargadores,$cantMouses,$cantMesas,$cantSillas,"incompleto", $_SESSION['AmbCod']];

    $CRUD->Insert($tablaNombre, $campos, $values);

    }
    if($consult == 'updateBita')
    {
    //Nombre Tabla
    $tablaNombre = $_POST['tablaname'];

    $cantPortatiles = $_POST['poscantPortatiles'];
    $cantCargadores = $_POST['poscantCargadores'];
    $cantMouses = $_POST['poscantMouse'];
    $cantMesas = $_POST['poscantMesas'];
    $cantSillas = $_POST['poscantSillas'];

    //campoPKs
    $campoPK = 'id_bitacora';
    //ValorPKs
    $valorPK = $_POST['codigoBitacora'];
        
    $campos = ["pos_cant_port","pos_cant_carg","pos_cant_mouse","pos_cant_mesas","pos_cant_sillas","estado"];
    $values = [$cantPortatiles,$cantCargadores,$cantMouses,$cantMesas,$cantSillas,"completo"];
    // Ejecutar la función Update()
    $resultado = $CRUD->Update($campos, $values, $tablaNombre, $campoPK, $valorPK);  
    }
}

?>