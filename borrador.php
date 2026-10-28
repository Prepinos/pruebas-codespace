<?php

$cadena_conexion = 'mysql:dbname=empresa;host=127.0.0.1';
$usuario = 'root';
$clave = '';
try {
    $bd = new PDO($cadena_conexion, $usuario, $clave);
    $sql = 'SELECT CONCAT(e.Nombre, " ", e.Apellido1, " ", e.Apellido2) AS Empleado, d.Nombre AS departamento FROM empleados e JOIN departamentos d ON e.Departamento = d.CodDept';
    $empleados = $bd->query($sql);
    echo "<table border='1'>";
    echo "<tr style='background-color: #f2f2f2;'><th>Empleado</th><th>Departamento</th></tr>";
    $i = 0;
    foreach ($empleados as $empleado) {
        $color = ($i % 2 == 0) ? '#ffffff' : '#f2f2f2';
        echo "<tr style='background-color: $color;'>";
        echo "<td>" . $empleado['Empleado'] . "</td>";
        echo "<td>" . $empleado['departamento'] . "</td>";
        echo "</tr>";
        $i++;
    }
    echo "</table>";
} catch (PDOException $e) {
    echo "Error en la conexión: " . $e->getMessage();
}
?>
