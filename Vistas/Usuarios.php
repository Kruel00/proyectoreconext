<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/site.css">
</head>

<body>
    <?php include("../vistas/layout.php"); ?>
    <div class="body-page">


        <div class="datos-usuario">
            <ul>
                <li>Nombre: <div class="datos-usuarios"> Javier Castorena </div>
                </li>
                <li>Numero de empleado:<div class="datos-usuarios"> 60663</div>
                </li>
                <li>Departamento:<div class="datos-usuarios"> IT Support</div>
                </li>
                <li>Puesto:<div class="datos-usuarios"> Tec. Soporte en sistemas</div>
                </li>
            </ul>
        </div>

        <div class="crear-solictud">
            <div class="nueva-solicitud">
                <form action="" method="POST">
                    
                    <div class="form-control">
                        <label for="slct_departamento">Seleccione Departamento</label>
                        <Select>
                            <option value="1">Seguridad Patrinmonial</option>
                        </Select>
                    </div>

                    <div class="form-control">
                        <label for="slct-tarea">Tipo de solicitud</label>
                        <select name="1" id="">
                            <option value="1">Salida de carton</option>
                        </select>
                    </div>

                    <div class="form-control">
                        <input type="submit" value="Crear Nueva">
                    </div>
            </div>


            <div class="controles-departamentos">

            </div>


            </form>
        </div>

        <div class="tabla-datos">
                <table>
                    <tr>
                        <td>ID Solicitud</td>
                        <td>Descripcion</td>
                        <td>Evidencia</td>
                        <td>ASSET</td>
                        <td>Fecha</td>
                        <td>Cantidad</td>
                        <td>Departamento</td>
                        <td>Actividad</td>
                        <td>Estado de solicitud</td>
                        <td>RH</td>   
                    </tr>
                </table>
        </div>

    </div>
</body>

</html>