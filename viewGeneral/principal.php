<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!--Principal Archivo CSS-->
    <link rel="stylesheet" href="../ArchivosCSS/GeneralCSS/principal/principal.css">
    <!--Enlaces Fuentes Gooogle Fonst-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan&display=swap" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">

    <!---->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Principal Page</title>
</head>
<body class="home">
<style>

</style>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <div id="sesion-container">
            <h5 id="sesion"> Bienvenido <?Php echo $_SESSION['nombre']; ?> ¿Que deseas hacer hoy?</h5>
            </div>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <span id="clock"></span>
            </div>
        </div>
    </nav>

    <div class="wrapper">
        <aside id="sidebar">
            <div class="d-flex">
                <button class="toggle-btn" type="button">
                    <i class="lni lni-grid-alt"></i>
                </button>
                <div class="sidebar-logo">
                    <a href="#">Menu</a>
                </div>
            </div>
            <ul class="sidebar-nav">
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link" id="Abrir1" onclick="FormBitacoraPASS_ONE()">
                    <i class="fa-solid fa-list-check"></i>
                        <span>Bitacora</span>
                    </a>
                </li>
                
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse" data-bs-target="#usuarios" aria-expanded="false" aria-controls="usuarios">
                    <i class="fa-solid fa-user"></i>
                        <span>Usuarios</span>
                    </a>
                    <ul id="usuarios" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="#" onclick="FormularioUsuario()" class="sidebar-link">Crear</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="#" onclick="MostrarUsuarios(2)" class="sidebar-link">Listar</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse" data-bs-target="#ambientes" aria-expanded="false" aria-controls="ambientes">
                    <i class="fa-solid fa-passport" style="color: #ffffff;"></i>
                        <span>Tipo Documento</span>
                    </a>
                    <ul id="ambientes" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link" onclick="MostrarFormularioInsertDoc()">Crear</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link" onclick="MostrarDocumentos(2)">Listar</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse" data-bs-target="#elementos" aria-expanded="false" aria-controls="elementos">
                    <i class="fa-solid fa-desktop" style="color: #ffffff;"></i>
                        <span>Elementos</span>
                    </a>
                    <ul id="elementos" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link" onclick="formularioElementos()" >Crear</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link" onclick="mostrarElemento(2)">Listar</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse" data-bs-target="#roles" aria-expanded="false" aria-controls="roles">
                    <i class="fa-solid fa-users"></i>
                        <span>Roles</span>
                    </a>
                    <ul id="roles" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link" onclick="formularioRol()">Crear</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link" onclick="mostrarRol(2)" >Listar</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse" data-bs-target="#Ambientes" aria-expanded="false" aria-controls="Ambientes">
                    <i class="fa-solid fa-building" style="color: #ffffff;"></i>
                        <span>Ambientes</span>
                    </a>
                    <ul id="Ambientes" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link" onclick="MostrarFormularioInsertAmbientes()">Crear</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link" onclick="MostrarAmbientes(2)" >Listar</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse" data-bs-target="#Reportes" aria-expanded="false" aria-controls="Reportes">
                    <i class="fa-solid fa-triangle-exclamation" style="color: #ffffff;"></i>
                        <span>Reporte</span>
                    </a>
                    <ul id="Reportes" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link" onclick="FormReporte()">Crear</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link" onclick="MostrarReporte(2)">Listar</a>
                        </li>
                    </ul>
                </li>

            </ul>
            <div class="sidebar-footer">
                <a href="#" class="sidebar-link">
                    <i class="lni lni-exit"></i>
                    <span>Logout</span>
                </a>
            </div>
        </aside>
    </div>

    <?php  
    include "../Modulos/ModuloNovedades/vista/ViewNovedades.php"; ?>

    <!--Mostrar agregar-->
    <div class="modal fade" id="Bitacora" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content ">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 title-modal" id="exampleModalLabel"></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-bodyBitacora">
                </div>
            </div>
        </div>
    </div>

    <!--Mostrar detalles-->
    <div class="modal fade" id="Detalle" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 title-modal" id="exampleModalLabel"></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-bodyMostrarDetalle">
                </div>
            </div>
        </div>
    </div>

    <!--Mostrar Listar-->
    <div class="modal fade" id="Listar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 title-modal" id="exampleModalLabel"></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                </div>
            </div>
        </div>
    </div>

    <!--Mostrar agregar-->
    <div class="modal fade" id="Agregar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content ">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 title-modal" id="exampleModalLabel"></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-bodyAgregar">
                </div>
            </div>
        </div>
    </div>

    <!--Mostrar agregar-->
    <div class="modal fade" id="Editar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content ">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 title-modal" id="exampleModalLabel"></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-bodyEditar">
                </div>
            </div>
        </div>
    </div>

    <!--Mostrar resetear contraseña-->
    <div class="modal fade" id="ResetContrasena" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel"></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-bodyReset">
                
                </div>
            </div>
        </div>
    </div>

    <!--Mostrar Reporte multiple-->
    <div class="modal fade" id="Reporte" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content ">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 title-modal" id="exampleModalLabel"></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                
                <div class="modal-bodyReporte">
                </div>
            </div>
        </div>
    </div>

    <!-----------------------------Modales para el proceso de bitacora----------------------------------->
    <div class="modal fade" id="BitPASS_ONE" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-bodyBitPASS_ONE">
                </div>
            </div>
        </div>
    </div>

    <!--Script KQuery-->
    <script src="../ArchivosJS\Jquery\jquery-3.7.1.min.js"></script>
    <!--Script de bootstrap-->
    <script src="../ArchivosJS\BootstrapJS\js\bootstrap.js"></script>
    <!--Include de las funciones de la pagina principal -->
    <script src="../ArchivosJS\Funciones\Pincipal\funciones_principal.js"></script>
    <script src="../ArchivosJS\Funciones\Pincipal\script.js"></script>

    <!--Ajax de uso diario-->
    <script src="../ArchivosJS/Ajax/ajaxBitacora.js"></script>

    <script src="../ArchivosJS/Ajax/ajaxUsuario.js"></script>  
    <script src="../ArchivosJS/Ajax/ajaxElemento.js"></script> 
    <script src="../ArchivosJS/Ajax/ajaxElementos.js"></script> 
    <script src="../ArchivosJS/Ajax/ajaxTipDoc.js"></script>  
    <script src="../ArchivosJS/Ajax/ajaxRol.js"></script>
    <script src="../ArchivosJS/Ajax/ajaxAmbientes.js"></script>
    <script src="../ArchivosJS/Ajax/ajaxReporte.js"></script>
    <script src="../ArchivosJS/Ajax/ajaxNovedades.js"></script>


    <script src="https://cdn.datatables.net/plug-ins/1.11.5/i18n/Spanish.json"></script>
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>



    <!--Funciones para Datos Usuarios-->
  
    <script src="../ArchivosJS/Ajax/ajaxResetPw.js"></script>  
    <script src="../ArchivosJS\Funciones\funcionesSelectsDisable.js"></script>

</body>

</html>
<script src="../ArchivosJS\Funciones\Pincipal\modalNueva.js"></script>
<input type="hidden" id="userEmail" value="<?php echo isset($_GET["correo"]) ? htmlspecialchars($_GET["correo"]) : "" ?>">
