<?php
if ($_POST["usuario"]==="usuario" && $_POST["clave"]==="clave"){
    header("Location:comprobar_login3.php");
}else{
    header("Location:comprobar_login4.php");
}
?>