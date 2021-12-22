<?php
include("conectDB.php");

$datosLogin = [
    "username" => $_POST['username'],
    "passwd" => $_POST['passwd'],
];

#Definicion de las variables con los datos para conectarse al dominio
$username = $_POST['username'];
$password = $_POST['passwd'];
$server = 'valuout.com';
$domain = '@valuout.com';
$port = 389;

### Coneccion con el dominio y envio de parametros
$connection = ldap_connect($server, $port);
ldap_set_option($connection, LDAP_OPT_PROTOCOL_VERSION, 3);
ldap_set_option($connection, LDAP_OPT_REFERRALS, 0);

if(!$connection)
{
    $_SESSION['loginsusses'] = true;
    $_SESSION['credencial'] = $datosLogin;
    echo "no se pudo conectar al dominio";

}


### Validacion de credenciales
$bind = @ldap_bind($connection, $_POST['username'] . $domain, $_POST['passwd']);
if (!$bind) {
    ### Credenciales erroneas o el nominio no es accesible.
    echo " -- No se pudo conectar al dominio... se intentara con la base de datos. <br>";
    ldap_close($connection);
} else {
    ### Credenciales correctas.
    echo " -- Credenciales correctas<br>";
    echo " -- Se conecto al dominio...";
    obtenerDatos($username, $connection );
    ldap_close($connection);
}


function obtenerDatos($username, $connection )
{
    $distinguished_name = "DC=valuout,DC=com";
    $filter = "(|(SAMAccountName=$username))";
    $search = ldap_search($connection, $distinguished_name, $filter);

    if(!$search)
    {
        echo "<b><h2> Usuario desabilitado contacte a IT Support</h2></b>";

        exit;
    }
    else
    {
        #Si se encontro el usuario. obtener sus datos
        $total_record = ldap_count_entries($connection, $search);
        $returned = ldap_get_entries($connection, $search);
        if ($total_record > 0) {
            echo "<br> se encontraron los datos en el dominio  <br>";
        }
    }
}

function almacenardatos($returned)
{
    ### Almacenar los datos del usuario en la session "userdata".
 
    $datosUsuario = [
        "numempleado" => $returned[0]['employeenumber'][0],
        "nombre" => $returned[0]['givenname'][0],
        "apellido" => $returned[0]['sn'][0],
        "usuariodominio" => $returned[0]['samaccountname'][0],
        "passwdOK" => $_POST['passwd'],
        "departamento" => $returned[0]['department'][0],
        "puesto" => $returned[0]['title'][0],
        "mail" => $returned[0]['mail'][0]
    ];

    $_SESSION["userdata"] = $datosUsuario;
    echo var_dump($datosUsuario);
}

?>