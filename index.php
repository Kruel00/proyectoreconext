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
            <form action="" method="POST">
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

if (isset($_POST['entrar'])) {
    logInValidate();
}

function logInValidate()
{
    $username = $_POST['username'];
    $password = $_POST['passwd'];
    $server = 'valuout.com';
    $domain = '@valuout.com';
    $port = 389;
    error_reporting(0);
    $connection = ldap_connect($server, $port);
    ldap_set_option($connection, LDAP_OPT_PROTOCOL_VERSION, 3);
    ldap_set_option($connection, LDAP_OPT_REFERRALS, 0);

    $bind = ldap_bind($connection, $username . $domain, $password);
    if ($bind) {
        $distinguished_name = "DC=valuout,DC=com";
        $filter = "(|(samaccountname=$username))";
        $search = ldap_search($connection, $distinguished_name, $filter);
        if(!$search){
            echo "<h1>Usuario incorrecto!</h1>";
        }
       // $total_record = ldap_count_entries($connection, $search);
        $returned = ldap_get_entries($connection, $search);

        if (count($returned) < 2) {
            echo "<h1>Contraseña incorrecta!</h1>";
            exit;
        } else {
            $datosUsuario = [
                "numempleado" => $returned[0]['employeenumber'][0],
                "nombre" => $returned[0]['givenname'][0],
                "apellido" => $returned[0]['sn'][0],
                "usuariodominio" => $returned[0]['samaccountname'][0],
                "departamento" => $returned[0]['department'][0],
                "puesto" => $returned[0]['title'][0],
                "email" => $returned[0]['mail'][0]
            ];
            session_start();
            $_SESSION['datosDelUsuario'] = $datosUsuario;
            header("Location: controladores/user_controller.php");
            die();
        }
    } else {
        echo "<h1>usuario o contraseña incorrecta!</h1>";
    }

}

?>

</html>