<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Registro de usuarios</h1>
    <br>
    <form action="" method="post">
        <label for="">Empleado</label>
        <input type="text" focused name="txtNumempleado">
    </form>
    <?php
    error_reporting(0);
    include("../Controladores/conectDB.php");
    $username = "jcastorena";
    $password = "Cast0rena**";
    $server = 'valuout.com';
    $domain = '@valuout.com';
    $port = 389;

    if (isset($_POST['txtNumempleado'])) {
        $numEmpleado = $_POST['txtNumempleado'];
    } else {
        exit;
    }
    //$numEmpleado = $_POST['txtNumempleado'];

    $connection = ldap_connect($server, $port);
    ldap_set_option($connection, LDAP_OPT_PROTOCOL_VERSION, 3);
    ldap_set_option($connection, LDAP_OPT_REFERRALS, 0);

    $bind = @ldap_bind($connection, $username . $domain, $password);
    $distinguished_name = "DC=valuout,DC=com";
    //$filter = "(|(employeenumber=$numEmpleado))";
    $filter = "(|(samaccountname=$numEmpleado))";
    $search = ldap_search($connection, $distinguished_name, $filter);
    $total_record = ldap_count_entries($connection, $search);
    $returned = ldap_get_entries($connection, $search);

    if (count($returned) < 2) {
        echo "<h1>Numero de empleado invalido</h1>";
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

        regcampos($con, $datosUsuario);
        regUser($con, $datosUsuario);
    }

    ldap_close($connection);
    ?>

    <br>

    <div class="form-control">
        <label for="">Usuario: </label>
        <input type="text" disabled name="txtUser" value="<?php echo $datosUsuario['usuariodominio']; ?>" id="">
    </div>
    <div class="form-control">
        <label for="">Numero de empleado: </label>
        <input type="text" name="txtNumEmpleado" id="" value="<?php echo $datosUsuario['numempleado']; ?>" disabled>
    </div>
    <div class="form-control">
        <label for="">Nombre: </label>
        <input type="text" name="txtName" disabled value="<?php echo $datosUsuario['nombre'] . " " .  $datosUsuario['apellido'] ?>">
    </div>
    <div class="form-control">
        <label for="">Departamento:</label>
        <input type="text" disabled name="txtDepartamento" value="<?php echo $datosUsuario['departamento'] ?>">
    </div>
    <div class="form-control">
        <label for="">Puesto: </label>
        <input type="text" disabled name="txtPuesto" value="<?php echo $datosUsuario['puesto'] ?>" id="">
    </div>
    <div class="form-control">
        <label for="">Email: </label>
        <input type="text" disabled name="txtemail" value="<?php echo $datosUsuario['email'] ?>" id="">
    </div>
    <div class="form-control">
        <label for="">Tipo de usuario: </label>
        <select name="" id="">
            <option value="1">Usuario</option>
            <option value="2">Administrador</option>
            <option value="3">Directivo</option>
        </select>
    </div>
    <div class="form-control">
        <button>Guardar</button>
    </div>

    <?php

    function regcampos($con, $datosUsuario)
    {
        $depa = $datosUsuario['departamento'];
        $consult = "SELECT * FROM departamento where NombreDepartamento = '$depa' ";
        $result = sqlsrv_query($con, $consult);
        $row = sqlsrv_fetch_array($result);

        if (!$row) {
            $consult = "insert into Departamento values('$depa')";
            $result = sqlsrv_query($con, $consult);
        }

        $puest = $datosUsuario['puesto'];
        $consultp = "SELECT * FROM Puesto where Descripcion = '$puest'";
        $resultp = sqlsrv_query($con, $consultp);
        $rowp = sqlsrv_fetch_array($resultp);

        if (!$rowp) {
            $consultp = "insert into Puesto values('$puest')";
            $resultp = sqlsrv_query($con, $consultp);
        }
    }

    function regUser($con, $datosUsuario)
    {
        $usuario = $datosUsuario['usuariodominio'];
        $numEmpleado = $datosUsuario['numempleado'];
        $nombre = $datosUsuario['nombre'];
        $apellido = $datosUsuario['apellido'];
        $mail = $datosUsuario['email'];
        $puesto = $datosUsuario['puesto'];
        $departamento = $datosUsuario['departamento'];

        $consultpuesto = "select PuestoID from puesto where descripcion = '$puesto' ";
        $resultPuesto = sqlsrv_query($con, $consultpuesto);
        $rowRR = sqlsrv_fetch_array($resultPuesto);
        $puesto = $rowRR[0];

        $consultdepartamento = "select departamentoId from departamento where NombreDepartamento = '$departamento' ";
        $resultDepartamento = sqlsrv_query($con, $consultdepartamento);
        $rowDP = sqlsrv_fetch_array($resultDepartamento);
        $departamento = $rowDP[0];

        $consultSaveUser = "insert into users values ('$usuario',' ','$numEmpleado','$nombre','$apellido','$mail',1,$departamento,$puesto,1 )";
        $saveuser = sqlsrv_query($con, $consultSaveUser);
    }

    function crearSession(){
        
    }

    ?>

</body>

</html>