<?php

$cadena_conexion = 'mysql:dbname=empresa;host=127.0.0.1';
$usuario = 'root';
$clave = '';
try {
    $bd = new PDO($cadena_conexion, $usuario, $clave);
    $sql='select nombre, clave, rol from usuarios';
    $usuarios=$bd->query($sql);
    echo "numero de usuarios: " .$usuarios->rowCount(). "<br>";
    foreach ($usuarios as $usu){
        print "nombre: " .$usu['nombre'];
        print " clave: " .$usu['clave']. "<br>";
    }
} catch (PDOexcepcion $e) {
    echo "error en la conexion -: " . $e->getMessage();
}