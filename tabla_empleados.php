<?php

$cadena_conexion = 'mysql:dbname=empresa;host=127.0.0.1';
$usuario = 'root';
$clave = '';
try {
    $bd = new PDO($cadena_conexion, $usuario, $clave);
    $sql = 'SELECT CONCAT(e.Nombre, " ", e.Apellido1, " ", e.Apellido2) AS Empleado, d.Nombre AS departamento FROM empleados e JOIN departamentos d ON e.Departamento = d.CodDept';
    $empleados = $bd->query($sql);
    echo "<table border='1' >";
    echo "<tr style='background-color: #f2f2f2;'>
            <th>Empleado</th><th>Departamento</th>
          </tr>";
    $i = 0;
    foreach ($empleados as $empleado) {
        $color = ($i % 2 == 0) ? '#ffffff' : '#cee1ff';
        echo "<tr style='background-color: $color;'>";
        echo "<td>" . $empleado['Empleado'] . "</td>";
        echo "<td>" . $empleado['departamento'] . "</td>";
        echo "</tr>";
        $i++;
    }
    echo "</table> <br>";

    $sql2="select nombre from usuarios where rol = ?";
    $pre_nombre=$bd->prepare($sql2);
    $pre_nombre->execute(array(0));
    echo "usuarios con rol 0: " .$pre_nombre->rowCount(). "<br>";
    foreach ($pre_nombre as $usu) {
        print "Nombre: " .$usu['nombre']. "<br>";
    }

    $sql3 = "SELECT nombre FROM usuarios WHERE rol = :r AND nombre LIKE :n";
    $pre_random = $bd->prepare($sql3);
    $pre_random->execute(array('r' => 1, 'n' => 'paola'));
    $random_user = $pre_random->fetch(PDO::FETCH_ASSOC);
    if ($random_user) {
    echo "Usuario con rol 1 y nombre 'paola': " . $random_user['nombre'] . "<br>";
    } else {
        echo "No se encontró ningún usuario con rol 1 y nombre 'paola'.<br>";
}
} catch (PDOException $e) {
    echo "Error en la conexión: " . $e->getMessage();
}
?>

