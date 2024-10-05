<?php
    session_start();
    if(!isset($_SESSION['usuario'])) {
        header('Location: login.php');
        exit();
    }
    $usuario = $_SESSION["usuario"];
?>
<!DOCTYPE html>
    <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Welcome</title>
        </head>
                <body>
                    <p>Bienvenido <?= $usuario ?>!</p>
                    <a href="logout.php">Cerrar sesión</a>
                </body>
    </html>