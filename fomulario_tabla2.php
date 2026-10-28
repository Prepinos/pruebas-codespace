<?php
$tratamiento=($_POST["tratamiento"])??"";
$nombre=($_POST["nombre"])?? "";
$apellido=($_POST["apellido"])?? "";
$direccion=($_POST["direccion"])?? "";
$ciudad=($_POST["ciudad"])?? "";
$lista=(isset($_POST["preferencias"]) && is_array($_POST["preferencias"]) )?
        $_POST["preferencias"]: [];

echo "<h3>Datos introducidos</h3>";
if (isset($_POST["tratamiento"])){
    echo "Tratamiento: $tratamiento <br>";
}
if (!empty($_POST["nombre"])){
    echo "Nombre: $nombre <br>";
}
if (!empty($_POST["apellido"])){
    echo "Apellido: $apellido <br>";
}
if (!empty($_POST["direccion"])){
    echo "Direccion: $direccion <br>";
}
if (!empty($_POST["ciudad"])){
    echo "Ciudad: $ciudad <br>";
}
if (isset($_POST["preferencias"])){
    echo " Preferencias: <br>";
    if ($lista){
        foreach ($lista as $valor){
            echo "* $valor <br>";
        }
    }
}