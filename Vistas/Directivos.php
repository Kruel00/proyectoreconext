<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/site.css">
    <title>Document</title>
</head>
<body>
<?php include("../vistas/layout.php");
        include("../Controladores/conectDB.php");

        $insertconsult = "select * from criptomoneda";
        $result = sqlsrv_query($con, $insertconsult);
        echo
        "<table id='transac'>
        <tr>
            <td align='center'>ID de criptomoneda</td>
            <td align='center'>Criptomoneda</td>
            <td align='center'>Tipo de cambio</td>
            <td align='center'>Editar</td>
            <td align='center'>Borrar</td>
        </tr>
    ";

    ?>


</body>
</html>