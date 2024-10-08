<?php 
session_start();
if(isset($_SESSION['historial'])) {
    $historial = $_SESSION['historial'];
    if(array_key_exists("Token", $historial)) {
        $historial["Token"]++;
    } else {
        $historial["Token"] = 1;
    }
    $_SESSION['historial'] = $historial;
}



?>
<!DOCTYPE html>
    <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Ejercicio 4</title>
        </head>
                <body>
                <form action="" method="post" enctype="multipart/form-data">
                        <label for="usuario">Usuario:
                            <input type="text" name="usuario" id="usuario">
                        </label>
                        <br>
                        <label for="correo">Correo:
                            <input type="email" name="correo" id="correo">
                        </label>
                        <br>
                        <label for="mensaje">Mensaje
                            <input type="text" name="mensaje" id="mensaje">
                        </label>
                        <br>
                        <button type="submit">Iniciar sesión</button>
                    </form>
                    <a href="../ejercicio5/main.php">Ir al historial</a>
                </body>
    </html>