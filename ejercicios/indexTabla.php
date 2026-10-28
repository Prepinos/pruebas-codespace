<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["num1"]) && is_numeric($_POST["num1"])) {
        $num1 = $_POST["num1"];
        echo "<table border='1'>";
        echo "<tr><th colspan='5'>tabla del $num1</th></tr>";
        echo "<tr>";
        for ($i = 1; $i <= 10; $i++) {
            echo "<td> $num1 x $i = " . ($num1 * $i) . "</td>";
            if ($i == 5) {
                echo "</tr><tr>";
            }
        }
        echo "</tr>";
        echo "</table>";
        exit();
    } else {
        echo "datos introducidos no validos";
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>formulario numero</title>
        <meta charset="UTF-8">
    </head>
    <body>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            escribe un numero:
            <input type="text" name="num1">
            <input type="submit" value="enviar">
        </form>
    </body>
</html>