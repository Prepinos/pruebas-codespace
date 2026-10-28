<?php
$a=empty($_POST["usuario"])?"campo vacío": $_POST["usuario"];
$b=empty($_POST["clave"])?"campo vacío": $_POST["clave"];
echo "el usuario es: $a <br>";
echo "la contraseña es: $b <br>";