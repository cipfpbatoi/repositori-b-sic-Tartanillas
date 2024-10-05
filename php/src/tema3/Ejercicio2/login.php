<?php
    session_start();
    $usuarioValido = $_SESSION['usuario'] = "miguel";
    $contrasenyaValida = $_SESSION['contrasenya'] = "1234";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $usuario = htmlspecialchars($_POST['usuario']);
        $contrasenya = htmlspecialchars($_POST['contrasenya']);
        $_SESSION["usuario"] = $usuario;
        $usuarioCorrecto = false;
        $contrasenyaCorrecta = false;
        if($usuario === $usuarioValido) {
            $usuarioCorrecto = true;
            if($contrasenya === $contrasenyaValida) {
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
                </body>
    </html>