<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $clave=$_POST["clave"];
    $cont=$_POST["cont"];
    if (isset($_POST["num1"]) && is_numeric($_POST["num1"])){
        $num1=$_POST["num1"];
        if($num1>$clave){
            echo "el numero oculto es menor <br>";
        }elseif($num1<$clave){
            echo "el numero oculto es mayor <br>";
        }else{
            echo "felicidades, acertaste el numero $num1 en $cont intentos <br>";
            echo "<a href='" .htmlspecialchars($_SERVER["PHP_SELF"]). "'>volver a jugar</a>";
            return;
        }
        $cont++;
    }else{
        echo "error: debes introducir un numero <br>";
    }
}else{
    $clave=rand(1,100);
    $cont=1;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>adivina adivinanza</title>
        <meta charset="UTF-8">
    </head>
    <body>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <h3>intento numero <?php echo $cont;?></h3>
            adivina el numero:
            <input type="text" name="num1">
            <input type="hidden" name="clave" value="<?php echo $clave; ?>">
            <input type="hidden" name="cont" value="<?php echo $cont; ?>">
            <input type="submit" value="enviar">
        </form>
    </body>
</html>