<!DOCTYPE html>
    <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Ejercicio 4</title>
        </head>
                <body>
                    <?php
                        $cadena = "ASDADSA";
                        $totalVocales = 0;
                        for($i = 0; $i < strlen($cadena); $i++) {
                            if(strcasecmp($cadena[$i], "a") || $cadena[$i] == "e" || $cadena[$i] == "i" || $cadena[$i] == "o" || $cadena[$i] == "u") {
                                $totalVocales++;
                            }
                        }
                        echo "Frase= " . $cadena . "<br> Total vocales= " . $totalVocales;
                    ?>
                </body>
    </html>