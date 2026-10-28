<?php
session_start();
if(!isset($_SESSION["usuario"])){
    header("Location: sesiones1_login.php?redirigido=true");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>pagina principal</title>
        <meta charset="UTF-8">
    </head>
    <body>
        <?php echo "Bienvenido " .$SESSION["usuario"];?>
        <br><a hfer="sessiones1_logout.php"> salir<a>
    </body>
</html>
