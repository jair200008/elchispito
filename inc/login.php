<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <style>
        body {
            background-image: url('./img/42447.jpg'); /* Reemplaza 'ruta_de_la_imagen.jpg' con la ruta de tu imagen */
            background-size: cover; /* Para cubrir todo el área del body */
            background-position: center; /* Para centrar la imagen */
            padding-top: 50px;
            padding-bottom: 50px;
        }
        .login-box {
            border: 1px solid #ccc;
            border-radius: 20px;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
        }
        .text-center {
            color: #355586;
            font-size: 30px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            text-transform: uppercase;
            letter-spacing: 1px;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
            font-weight: bold;
            border-bottom: 2px solid #355586;
            padding-bottom: 5px;
            margin-bottom: 10px;
        }

        .copy {
            text-align: center;
            font-size: 12px;
            color: #355586;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin-top: 20px;
        }

        .copy a {
            color: #355586;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4 col-xs-12">
                <div class="login-box">
                    <a href="https://paginatesteoweb.pages.dev/" target="_blank">
                        <img src="./img/Supermarket-05-06.png" alt="" class="img-responsive center-block animate__animated animate__bounce" style="max-width: 80%;">
                    </a>
                    <h3 class="text-center   animate__animated animate__backInLeft">Bienvenido</h3>
                    <div class="form-group">
                        <label for="usuario">Nombre de usuario</label>
                        <input placeholder="Nombre de usuario" type="text" id="usuario" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="palabra_secreta">Contraseña</label>
                        <input placeholder="Contraseña" type="password" id="palabra_secreta" class="form-control">
                    </div>
                    <div class="form-group">
                        <button id="iniciar_sesion" class="btn btn-primary btn-block">Iniciar sesión <i class="fa fa-sign-in"></i></button>
                    </div>
                    <p class="copy">copyright © NexusTech 2024</p>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function () {
            $("#usuario").focus();
            escuchar_elementos();
        });

        function escuchar_elementos() {
            $("#usuario").keyup(function (evento) {
                if (evento.keyCode === 13) $("#palabra_secreta").focus();
            });

            $("#palabra_secreta").keyup(function (evento) {
                if (evento.keyCode === 13) $("#iniciar_sesion").click();
            });

            $("#iniciar_sesion").click(function () {
                var usuario = $("#usuario").val(),
                    palabra_secreta = $("#palabra_secreta").val();
                if (usuario.length <= 0 || palabra_secreta.length <= 0) {
                    $("#usuario").focus();
                    return;
                }
                var html_original = $("#iniciar_sesion").html();
                $("#iniciar_sesion")
                    .html('Comprobando... <i class="fa fa-spin fa-refresh"></i>')
                    .removeClass('btn-success btn-warning btn-danger')
                    .addClass('btn-warning');
                $.post('./modulos/usuarios/comprobar_datos.php', {datos_usuario: [usuario, palabra_secreta]}, function (respuesta) {

                    respuesta = JSON.parse(respuesta);
                    console.log("La respuesta es:", respuesta);
                    if (respuesta === true) {
                        $("#iniciar_sesion")
                            .html('Correcto <i class="fa fa-check-square"></i>')
                            .removeClass('btn-success btn-warning btn-danger')
                            .addClass('btn-success')
                            .animateCss("bounceOut");
                        setTimeout(function () {
                            window.location.reload();
                        }, 200);
                    } else {
                        $("#iniciar_sesion")
                            .html('Datos incorrectos <i class="fa fa-exclamation"></i>')
                            .removeClass('btn-success btn-warning btn-danger')
                            .addClass('btn-danger')
                            .animateCss("shake");
                        $("#usuario").focus();
                    }
                });
            });
        }
    </script>
</body>
</html>
