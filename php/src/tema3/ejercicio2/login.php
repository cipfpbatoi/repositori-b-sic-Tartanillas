<?php
    session_start();
    if(isset($_SESSION['historial'])) {
        $historial = $_SESSION['historial'];
        if(array_key_exists("Login", $historial)) {
            $historial["Login"]++;
        } else {
            $historial["Login"] = 1;
        }
        $_SESSION['historial'] = $historial;
    }
    $usuarios = [
        "miguel" => "1234",
        "juan" => "abcd",
        "ana" => "5678"
    ];
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $usuario = htmlspecialchars($_POST['usuario']);
        $contrasenya = htmlspecialchars($_POST['contrasenya']);
        $usuarioCorrecto = false;
        $contrasenyaCorrecta = false;
        if(array_key_exists($usuario, $usuarios)) {
            $_SESSION["usuario"] = $usuario;
            $usuarioCorrecto = true;
            if($contrasenya === $usuarios[$usuario]) {
                header('Location: welcome.php');
                $contrasenyaCorrecta = true;
                exit();
            }
        }
        if($usuarioCorrecto === false) {
            echo "Usuario incorrecto.";
        } elseif($contrasenyaCorrecta === false) {
            echo "Contraseña incorrecta.";
        }
    }
?>

<!DOCTYPE html>
    <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Login</title>
        </head>
                <body>
                    <form action="" method="post" enctype="multipart/form-data">
                        <label for="usuario">Usuario:
                            <input type="text" name="usuario" id="usuario">
                        </label>
                        <label for="contrasenya">Contraseña:
                            <input type="password" name="contrasenya" id="contrasenya">
                        </label>
                        <button type="submit">Iniciar sesión</button>
                    </form>
                    <a href="../ejercicio5/main.php">Ir al historial</a>
                </body>
    </html>