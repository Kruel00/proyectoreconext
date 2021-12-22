<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="login-area">
        <div class="form-area">
            <form action="/Controladores/user_controller.php" method="POST">
                <div class="form-header">
                </div>
                <div class="fomr-controls">
                    <div class="form-control">
                        <label for="txt_user">Usuario</label>
                        <input type="text" name="username" placeholder="Usuario de dominio">
                    </div>
                    <div class="form-control">
                        <label for="txt_pass">Contraseña</label>
                        <input type="password" name="passwd" placeholder="Contraseña">
                    </div>
                    <div class="form-control">
                        <input type="submit" name="entrar" Value="Entrar">
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
<?php
if (@$_GET['passwordfail'] == 'true') {
    echo "<br> contraseña incorrecta";
}

if (@$_GET['usuarioActivo'] == 'false') {
    echo "<br> Usuario inactivo, Cantacte a IT Support";
}

?>
</html>