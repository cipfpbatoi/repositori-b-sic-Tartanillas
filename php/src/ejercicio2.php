<?php
    for($i = 2; $i <= 20; $i++) {
        if($i % 2 == 0) {
            echo $i . " ";
        }
    }
    echo "<br>";
    $contador = 2;
    while($contador <= 20) {
        if($contador % 2 == 0) {
            echo $contador . " ";
        }
        $contador++;
    }
?>
