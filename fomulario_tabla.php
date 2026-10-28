<form action="fomulario_tabla2.php" method="post">
    <table border="0">
        <tr>
            <td>Tratamiento</td>
            <td>
                <input type="radio" name="tratamiento" value="sr" checked> Señor
                <input type="radio" name="tratamiento" value="sra"> Señora
                <input type="radio" name="tratamiento" value="srita"> Señorita
            </td>
        </tr>
        <tr>
            <td>Nombre</td>
            <td><input type="text" name="nombre"></td>
        </tr>
        <tr>
            <td>Apelllido</td>
            <td><input type="text" name="apellido"></td>
        </tr>
        <tr>
            <td>Direccion</td>
            <td><input type="text" name="direccion"></td>
        </tr>
        <tr>
            <td>Ciudad</td>
            <td><select name="ciudad">
                    <option selected>madrid</option>
                    <option>toledo</option>
                    <option>navarra</option>
                    <option>desconocido</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Preferencias</td>
            <td>
                <input type="checkbox" name="preferencias[]" value="libros">Libros
                <input type="checkbox" name="preferencias[]" value="peliculas">peliculas
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type="submit" value="enviar">
                <input type="reset" value="cancelar">
            </td>
        </tr>
    </table>
</form>