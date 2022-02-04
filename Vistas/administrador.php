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
    <?php include("../vistas/layout.php");
    ?>

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
                        <label for="">Solicitante</label>
                        <input type="text" placeholder="Numero de empleado">
                    </div>
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
                        <input type="submit" value="Crear" value="Enviar solicitud">
                    </div>
            </div>

            <div class="controles-departamentos">
                <h2>Formato Vacaciones</h2>

                <div class="controles-area">
                    <div class="form-control">
                        <label for="">Folio: </label>
                        <input type="text" value="A12456">
                    </div>
                    <div class="form-control">
                        <label for="">Compañia: </label>
                        <select name="" id="">
                            <option value="1">Clover Wireless</option>
                        </select>
                    </div>
                </div>

                <div class="controles-area">
                    <div class="form-control">
                        <label for="">Nombre: </label>
                        <input type="text" name="" id="" value="Javier Castorena">
                    </div>
                    <div class="form-control">
                        <label for="">Numero de empleado: </label>
                        <input type="text" value="60663">
                    </div>
                </div>

                <div class="controles-area">
                    <div class="form-control">
                        <label for="">Periodo:</label>
                        <input type="year" name="" id="">
                    </div>
                    <div class="form-control">
                        <label for="">Fecha de inicio:</label>
                        <input type="date">
                    </div>
                </div>

                <div class="controles-area">
                    <div class="form-control">
                        <label for="">Fecha retorno:</label>
                        <input type="date">
                    </div>
                    <div class="form-control">
                        <label for="">Semana de pago:</label>
                        <input type="text" value="50">
                    </div>
                </div>

                <div class="form-testo">
                    <label for="">Observaciones:</label>
                    <textarea name="" id="" cols="30" rows="5"></textarea>
                </div>

                <div class="form-control">
                    <input type="submit" value="Enviar">
                </div>
            </div>
            </div>
            </form>
<h2>Solicitudes pendientes</h2>

            <div class="tabla-datos">
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
                        <td>Accion</td>
                        <td>Accion</td>
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
                        <td><a href="">Editar</a></td>
                        <td><a href="">Borrar</a></td>
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
                        <td><a href="">Editar</a></td>
                        <td><a href="">Borrar</a></td>

                    </tr>

                </table>
            </div>
        <?php 
            session_start();
            
        ?>
        </div>
</body>

</html>