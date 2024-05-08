<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            background: linear-gradient(to right, #3380FF, #696B6E);
            padding-top: 50px;
            padding-bottom: 50px;
        }
        .login-box {
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4 col-xs-12">
                <div class="login-box">
                    <img src="./img/logo2.png" alt="" class="img-responsive center-block" style="max-width: 80%;">
                    <h3 class="text-center">Bienvenido</h3>
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
