<!DOCTYPE html>
    <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Ejercicio 3</title>
        </head>
                <body>
                    <?php
                        $array = [4, 75, 34, 122, 69];
                        $media = 0;
                        for($i = 0; $i < count($array); $i++) {
                            $media += $array[$i];
                        }
                        echo "Media final= " . $media / count($array);
                    ?>
                </body>
    </html>