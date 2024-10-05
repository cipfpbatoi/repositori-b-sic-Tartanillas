<!DOCTYPE html>
    <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Ejercicio 5</title>
        </head>
                <body>
                    <?php
                        $array = [];
                        for($i = 1; $i <= 13; $i++) {
                            for($j = 1; $j <= 13; $j++) {
                                $array[$i][$j] = $i * $j;
                            }
                        }
                        for($i = 1; $i <= 13; $i++) {
                            for($j = 1; $j <= 13; $j++) {
                                echo $i ." * ". $j . " = " . $array[$i][$j]. "<br>";
                            }
                            echo "<br><br><br>";
                        }
                    ?>
                </body>
    </html>