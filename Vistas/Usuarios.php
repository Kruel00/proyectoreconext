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
                            <option value="2">Recursos Humanos</option>
                        </Select>
                    </div>

                    <div class="form-control">
                        <label for="slct-tarea">Tipo de solicitud</label>
                        <select name="1" id="">
                            <option value="1">Salida de carton</option>
                            <option value="2">Solicitud de vacaciones</option>
                        </select>
                    </div>

                    <div class="form-control">
                        <input type="submit" value="Crear">
                    </div>
                </form>
            </div>
            <div class="area-formatos">
                <?php include("../Vistas/formatos/seguridad_patrimonial/pase_de_salida.php");?>
            </div>
        </div>
        <div class="area-soicitudes-pendientes">
        <br>
        <h2>Solicitudes pendientes de aprobacion</h2>
                    <table class="table table-striped">
                        <tr align="center">
                            <td>ID Solicitud</td>
                            <td>Descripcion</td>
                            <td>Evidencia</td>
                            <td>Tipo de salida</td>
                            <td>Fecha</td>
                            <td>Departamento</td>
                            <td>Actividad</td>
                            <td>Estado de solicitud</td>
                            <td>Estado de aprobacion</td>
                        </tr>

                        <tr align="center">
                            <td>1</td>
                            <td>Envio de carton a recicladora</td>
                            <td><a href="">Ver</a></td>
                            <td>Salida de material</td>
                            <td>2021-11-29</td>
                            <td>Seguridad Patrimonial</td>
                            <td>Salida de carton</td>
                            <td>Pendiente de aprobacion</td>
                            <td><a href="">Ver</a></td>

                        </tr>
                        <tr align="center">
                            <td>2</td>
                            <td>Aprobacion de vacaciones</td>
                            <td><a href="">Ver</a></td>
                            <td>Vacaciones </td>
                            <td>2021-11-29</td>
                            <td>Recursos Humanos</td>
                            <td>Solicitud de vacaciones</td>
                            <td>Pendiente de aprobacion</td>
                            <td><a href="">Ver</a></td>

                        </tr>
                    </table>
        </div>


    </div>
</body>

</html>