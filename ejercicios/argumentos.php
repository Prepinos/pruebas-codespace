<!DOCTYPE html>
<html>
    <head>
        <title>Suma de gets</title>
        <meta charset="UTF-8">
    </head>
    <body>
        <?php
            if (isset($_GET["num1"]) && is_numeric($_GET["num1"]) &&
                isset($_GET["num2"]) && is_numeric($_GET["num2"])){
                $num1=(int)$_GET["num1"];
                $num2=(int)$_GET["num2"];
                echo $num1+$num2;
            }else{
                echo "datos introducidos no validos";
            }
        ?>
    </body>
</html>