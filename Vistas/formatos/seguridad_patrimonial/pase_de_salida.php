<html>
<div class="top-banner">
</div>
<div class="body-format">
    <div class="form-area">
        <form action="">
            <h1>Pase de salida de materiales</h1>
            <div class="form-control-group">
                <div class="form-control">
                    <select name="slct_entrada_salida" id="slct_entrada_salida">
                        <option value="0" selected disabled>Seleecciones una opcion</option>
                        <option value="1">Salida</option>
                        <option value="2">Entrada</option>
                    </select>
                    <label for="txt_control">Tipo de pase</label>
                </div>

                <div class="form-control">
                    <input type="text" name="txt_control" id="txt_control" disabled>
                    <label for="txt_control">Nuemro control y version: </label>
                </div>

                <div class="form-control">
                    <input type="text" name="txt_folio" id="txt_folio" disabled>
                    <label for="txt_folio">Numero de Folio"</label>
                </div>
            </div>


            <div class="form-control-group">
                <div clas="form-control">
                    <input type="text" name="txt_nombre" id="txt_nombre">
                    <label for="txt_nombre">Nombre:</label>
                </div>

                <div class="form-control">
                    <input type="text" name="txt_num_empleado" id="txt_num_empleado">
                    <label for="txt_num_empleado">Numero de empleado:</label>
                </div>

                <div class="form-control">
                    <input type="text" name="txt_departamento" id="txt_departamento">
                    <label for="txt_departamento">Deprtamento:</label>
                </div>

            </div>


            <h3>Datos de registro</h3>
            <div class="form-control-group">

                <div class="form-control">
                    <input type="date" name="dt_fecha" id="dt_fecha">
                    <label for="dt_fecha">Fecha:</label>
                </div>

                <div class="form-control">
                    <input type="hour">
                    <label for="sl_hora">Hora de salida:</label>
                </div>

                <div class="form-control">
                    <input type="text" name="txt_pllanta" id="txt_pllanta">
                    <label for="txt_planta">Planta:</label>
                </div>
            </div>


            <h3>Descripcion del equipo / material</h3>
            <div class="form-control-group">
                <div class="form-control">
                    <input type="txt_cantiadad" name="txt_cantidad" id="txt_cantidad" placeholder="Cantidad">
                    <label for="txt_cantidad">Cantidad</label>
                </div>

                <div class="form-control">
                    <input type="txt_descripcion" placeholder="Descripcion">
                    <label for="txt_descripcion">Descripcion</label>
                </div>
            </div>
            <div class="form-control-group">
                <div class="form-control">
                    <button>Agregar</button>
                </div>
            </div>

            <div class="tabla">
                <table>
                    <tr>
                        <td>Cantidad</td>
                        <td>Descripcion</td>
                    </tr>
                </table>
            </div>
            <br>
            <div class="form-control-group">
                <div class="form-control">
                    <textarea name="txtarea_justificacion" id="txtarea_justificacion" cols="30" rows="2"></textarea>
                    <label for="txtarea_justificacion">Justificacion:</label>
                </div>
                <div class="form-control">
                    <input type="text" name="txt_proveedor" id="txt_proveedor" placeholder="Proveedor">
                    <label for="txt_provedor">Proveedor: </label>
                </div>
            </div>
    </div>
</div>
</form>
</div>
</div>

</html>