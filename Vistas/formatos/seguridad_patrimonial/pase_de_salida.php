<html>
<div class="top-banner">

</div>
<div class="body-format">
    <div class="form-area">
        <form action="">
            <div class="form-tittle">

            </div>
            <div class="form-control-area">
                <div class="form-control titulo">
                    <h2>Pase de salida de materiales</h2>
                </div>
                <div class="form-control">
                    <label for="slct_entrada_salida">
                        <select name="slct_entrada_salida" id="slct_entrada_salida">
                            <option value="0" selected disabled>Seleecciones una opcion</option>
                            <option value="1">Salida</option>
                            <option value="2">Entrada</option>
                        </select>
                    </label>
                    <div class="form-control">
                        <label for="txt_control">Nuemro control y version: </label>
                        <input type="text" name="txt_control" id="txt_control" disabled>
                    </div>
                    <div class="form-control">
                        <label for="txt_folio">Numero de Folio"</label>
                        <input type="text" name="txt_folio" id="txt_folio" disabled>
                    </div>

                    <div class="datos-solicitante">
                        <div class="form-control titulo">
                            <h3>Datos del solicitante</h3>
                        </div>
                        <div clas="form-control">
                            <label for="txt_nombre">Nombre:</label>
                            <input type="text" name="txt_nombre" id="txt_nombre">
                        </div>
                        <div class="form-control">
                            <label for="txt_num_empleado">Numero de empleado:</label>
                            <input type="text" name="txt_num_empleado" id="txt_num_empleado">

                        </div>
                        <div class="form-control">
                            <label for="txt_departamento">Deprtamento:</label>
                            <input type="text" name="txt_departamento" id="txt_departamento">
                        </div>
                    </div>

                    <div class="datos-registro">
                        <div class="form-control titulo">
                            <h3>Datos de registro</h3>
                        </div>
                        <div class="form-control">
                            <label for="dt_fecha">Fecha:</label>
                            <input type="date" name="dt_fecha" id="dt_fecha">
                        </div>

                        <div class="form-control">
                            <label for="sl_hora">Hora de salida:</label>
                            <input type="hour">
                        </div>

                        <div class="form-control">
                            <label for="txt_planta">Planta:</label>
                            <input type="text" name="txt_pllanta" id="txt_pllanta">
                        </div>
                    </div>

                    <div class="tipo_salida_area">
                        <div class="form-control titulo">
                            <h3>Tipo de salida</h3>
                        </div>
                        <div class="form-control">
                            <label for="slct_tipo_salida">Tipod de salida:</label>
                            <select name="slct_tipo_salida" id="slct_tipo_salida">
                                <option value="0" selected disabled>Seleccione una opcion</option>
                                <option value="1">Salida definitiva</option>
                                <option value="2">Entrada definitiva</option>
                                <option value="3">Salida provicional</option>
                                <option value="4">Entrada provicional</option>
                                <option value="5">Salida interplantas</option>
                                <option value="6">Donacion</option>
                            </select>
                        </div>
                    </div>
                    <div class="descripcion_area">
                        <div class="form-control titulo">
                            <h3>Descripcion del equipo / material</h3>
                        </div>
                        <div class="form-control">
                            <label for="txt_cantidad">Cantidad</label>
                            <input type="txt_cantiadad" name="txt_cantidad" id="txt_cantidad">
                        </div>
                        <div class="form-control">
                            <label for="txt_descripcion">
                                <label for="txt_descripcion">Decripcion: </label>
                                <input type="txt_descripcion" placeholder="Descripcion">
                            </label>
                        </div>
                        <div class="form-control">
                            <button>Agregar</button>
                        </div>
                        <div class="form-control">
                            <table>
                                <tr>
                                    <td>Cantidad</td>
                                    <td>Descripcion</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="justificacion-area">
                        <div class="form-control">
                            <label for="txtarea_justificacion">Justificacion:</label>
                            <textarea name="txtarea_justificacion" id="txtarea_justificacion" cols="30" rows="2"></textarea>
                        </div>
                        <div class="form-control">
                            <label for="txt_provedor">Proveedor: </label>
                            <input type="text" name="txt_proveedor" id="txt_proveedor" placeholder="Proveedor">
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

</html>