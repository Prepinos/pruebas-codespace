<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST["usuario"] === "usuario" && $_POST["clave"] === "clave") {
        echo "datos procesados con exito";
        return;
    } else {
        $error=true;
    }
}
?>
<?php if(isset($error)){
    echo "<p>error, revise el usuario y contraseña</p>";
}?>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
    usuario:
    <input type="text" name="usuario" value="<?php if(isset($_POST["usuario"]))echo $_POST["usuario"] ?>"><br>
    clave:
    <input type="password" name="clave"><br>
    <input type="submit" value="enviar">
</form>