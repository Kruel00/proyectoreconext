<?php
$servername = "SQL5080.site4now.net";
$database = "db_a7cb02_jcastorena";
$username = "db_a7cb02_jcastorena_admin";
$pass = "Castorena123";
$conectionInfo = array("Database" => $database, "UID" => $username, "PWD" => $pass, 'CharacterSet' => 'UTF-8');
$con = sqlsrv_connect($servername, $conectionInfo);
?>


