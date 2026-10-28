<?php
session_start();
if(!isset($_SESSION["count"])){
    $_SESSION["count"]=0;
}else{
    $_SESSION["count"]++;
}
echo "hola " .$_SESSION["count"];
echo "<br> <a href='session_cont2.php'>siguiente</a>";