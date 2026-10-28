<?php
            if (isset($_GET["num1"]) && is_numeric($_GET["num1"])){
                $num1=$_GET["num1"];
                echo "<table border='1'>";
                echo "<tr colspan='5'><th>tabla del $num1</th></tr>";
                echo "<tr>";
                for($i=1;$i<=10;$i++){
                    echo "<td> $num1 x $i = " .($num1*$i). "</td>";
                    if($i==5){
                        echo "</tr><tr>";
                    }
                }
                echo "</tr>";
                echo "</table>";
            }else{
                echo "datos introducidos no validos";
            }
        ?>