<?php

echo "<img src='pedro.jpg' width='100' heigth='100'>";

$tratamiento=$_GET["tratamiento"]??"";
$nombre=$_GET["nombre"]??"";
$apellido=$_GET["apellido"]??"";
$direccion=$_GET["direccion"]??"";
$ciudad=$_GET["ciudad"]??"";
$preferencias=(isset($_GET["preferencias"]) && is_array($_GET["preferencias"]))?
                $_GET["preferencias"]:[];

echo "<h3>Datos Introducidos</h3>";

if(isset($_GET["tratamiento"])){
    echo "tratamiento: $tratamiento <br>";
}
if(!empty($_GET["nombre"])){
    echo "nombre: $nombre <br>";
}
if(!empty($_GET["apellido"])){
    echo "apellido: $apellido <br>";
}
if(!empty($_GET["direccion"])){
    echo "direccion: $direccion <br>";
}
if(!empty($_GET["ciudad"])){
    echo "ciudad: $ciudad <br>";
}
if(isset($_GET["preferencias"])){
    echo "preferencias: <br>";
    if($preferencias)
        foreach($preferencias as $var){
            echo "* valor <br>";
        }
}