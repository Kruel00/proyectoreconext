<?php
$servername = "localhost";
$database = "pt1";
$username = "fuser";
$pass = "1234";
$conectionInfo = array("Database" => $database, "UID" => $username, "PWD" => $pass, 'CharacterSet' => 'UTF-8');
$con = sqlsrv_connect($servername, $conectionInfo);
?>


