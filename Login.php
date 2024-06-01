<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!---Ingreso Archivo CSS-->
    <link  rel="stylesheet" href="ArchivosCSS\GeneralCSS\login\login.css">
    <!--Boostrap Archivo CSS--->
    <link href="ArchivosCSS\BootstrapCSS\css\bootstrap.css" rel="stylesheet">
    <!--Iconos Archivo CSS-->
    <link rel="stylesheet" href="ArchivosCSS\fontawesome\css\all.css">
    <!--Enlaces Fuentes GoogleFonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan&display=swap" rel="stylesheet">
    <!---->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>S.I.S</title>
</head>
<body class="home">
   <div class="login-container">
    <form id="loginForm">
     <img class="siglas"  src="ArchivosCSS\Imagenes\SIS_2.png">
        <label for="email" id="labelcorreo">Ingrese su correo asignado:</label>
            <input class="form-control rounded-input" type="email" name="email" id="email">
        <br>
        <label for="password" >Ingrese su contraseña:</label>
            <input class="form-control rounded-input" type="password" name="password" id="password">
     <span id="showPasswordBtn" onclick="togglePasswordVisibility()"><i class="fa fa-eye fa-beat"></i></span>
    <button type="submit" class="btn btn-primary" id="ingresar">Ingresar</button>
    </form>
    <br>
     <!-- Boton de olvide mi contrasena -->
     <button type="button" class="btn btn-primary" id="contra" data-bs-toggle="modal" data-bs-target="#recoverypassword">
     !Ups¡, olvide mi contraseña
     </button>
   </div>

   <!--Div del logo en el circulo blanco-->
    <div class="logo">
        <img src="ArchivosCSS\Imagenes\SIS_1_mini.png" alt="logo SIS" id="logo">
    </div>
    <div class="contlogo">
       <div id="textol">
       Empoderando a tu empresa hacia el Éxito y la Eficiencia, un Inventario a la Altura de tus necesidades.
       </div>
    </div>

    <!--Modals-->
<div class="modal fade" id="recoverypassword" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl modal-1">
        <div class="modal-content">
            <div class="modal-body">
                <div class="recovery1">
                    <div class="recovery1-1">
                        <br>
                        <h2 class="text-center ">Recuperar contraseña</h2>
                        <br>
                        <br>
                        <label for="email">Ingrese el correo con el que normalmente ingresas :)</label>
                        <br>
                        <input class="form-control" style="border-radius: 10px; border-color: white;" type="email" name="email" id="email" required>
                        <br>
                        <button class="btn btn-primary" data-bs-target="#recoverypassword2" data-bs-toggle="modal">Enviar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!--Segundo Modal-->
<div class="modal fade" id="recoverypassword2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" id="modal-content-2">
            <div class="modal-body" id="modal-body">
                <div class="formulario">
                    <form class="form" action="recovery3.php" method="post">
                    <br>
                    <h2>Recuperar contraseña</h2>
                    <br>
                    <h6>Te hemos enviado un pequeño codigo, ingresalo aqui abajo</h6>
                    <br>
                    <input type="number" name="code" id="code" required>
                    <br>
                    <h6>Si de casualidad eres despistado te lo enviamos a foreronicolas82@gmail.com :)</h6>
                    <br>
                    <button class="btn btn-primary" style="font-family: 'League Spartan', sans-serif ;" data-bs-target="#recoverypassword" data-bs-toggle="modal">Enviar</button>
                    <br>
                    <br>
                    </form> 
                </div>
            </div>
        </div>       
    </div>
</div>

<!--Script de bootstrap-->
<script src="ArchivosJS\Jquery\jquery-3.7.1.min.js"></script>
<script src="ArchivosJS\BootstrapJS\js\bootstrap.js"></script>
<script src="funciones_login.js"></script>
</body>
</html>