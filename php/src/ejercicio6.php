<?php
    $nota = 10;
    $resultado = match($nota) {
        10 => "Excelente",
        9, 8 => "Muy bien",
        7, 6, 5 => "Bien",
        default => "Insuficiente"
    };
    echo $resultado;
?>
