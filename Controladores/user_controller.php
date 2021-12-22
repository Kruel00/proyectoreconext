    <?php
    include("../Controladores/conectDB.php");
    session_start();
    if (isset($_POST['entrar'])) {
        $username = $_POST['username'];
        $password = $_POST['passwd'];
    }
    else{
        echo "<script>location.href='../index.php?passwordfail=true';</script>";
    }

    $server = 'valuout.com';
    $domain = '@valuout.com';
    $port = 389;
    $connection = ldap_connect($server, $port);
    ldap_set_option($connection, LDAP_OPT_PROTOCOL_VERSION, 3);
    ldap_set_option($connection, LDAP_OPT_REFERRALS, 0);

    $bind = @ldap_bind($connection, $username . $domain, $password);
    if(!$bind)
    {
        echo "<script>location.href='../index.php?passwordfail=true';</script>";
        exit;
    }

    $distinguished_name = "DC=valuout,DC=com";
    $filter = "(|(employeenumber=$numEmpleado))";
    //$filter = "(|(samaccountname=$username))";
    $search = ldap_search($connection, $distinguished_name, $filter); 
    if(!$search){
        echo "<script>location.href='../index.php?usuarioActivo=false';</script>";
        exit;
    }
    $total_record = ldap_count_entries($connection, $search);
    $returned = ldap_get_entries($connection, $search);
    if (count($returned) < 2) {
        echo "no salio nada";
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
    }
    ldap_close($connection);



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

    function findUseronDB($username){
        include("../Controladores/conectDB.php");
        $consultu = "SELECT * FROM users where UserName = $username";
        $resultu = sqlsrv_query($con, $consultu);
        $rowu = sqlsrv_fetch_array($resultp);
    }

    function RegUser(){

    }
    ?>
