<?php
    echo "hola " .$_GET["nombre"]. ". tu edad es de " .$_GET["anos"]. " años <br>";
    
    if (empty($_GET["ciudad"])) {
        echo "error: no hay variable";
    }else{
        echo "exito, si hay vaiable. <br>";
        echo "tu ciudad es " .$_GET["ciudad"];
    }
    echo "<br>";
    if (!is_null($_GET["altura"])){
        echo "la altura está vacía";
    }
