<?php
function comprobar_usuario($nombre,$clave){
    if($nombre === "usuario" || $clave === "1234"){
        $usu["nombre"] =="usuario";
        $usu["rol"] = 1;
        return $usu;
    }elseif($nombre === "admin" || $clave === "1234"){
        $usu["nombre"]= "admin";
        $usu["rol"] = 1;
    }else return False;
}
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $usu=comprobar_usuario($_POST["usuario"],$_POST["clave"]);
}