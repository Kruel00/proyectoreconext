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
        crearSession($datosUsuario);
    }

    ldap_close($connection);

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

    function crearSession($datosUsuario)
    {
        session_start();
    }
    ?>

    </body>

    </html>