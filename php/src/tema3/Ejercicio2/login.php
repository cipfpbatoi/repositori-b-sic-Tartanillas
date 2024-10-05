<?php
    session_start();
    if (isset($_COOKIE['recordar'])) {
        $_SESSION['usuario'] = $_COOKIE['recordar'];
        header('Location: welcome.php');
        exit();
    }

    $usuarioValido = "miguel";
    $contrasenyaValida = "1234";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $usuario = htmlspecialchars($_POST['usuario']);
        $contrasenya = htmlspecialchars($_POST['contrasenya']);
        
        $recordarUsuario = false;
        $usuarioCorrecto = false;
        $contrasenyaCorrecta = false;

        if($usuario === $usuarioValido) {
            $_SESSION['usuario'] = $usuario;
            $usuarioCorrecto = true;
            if($contrasenya === $contrasenyaValida) {
                if(isset($_POST['recordar'])) {
                    $recordarUsuario = true;
                    setcookie(
                        'recordar',
                        $usuarioValido,
                        [
                            'expires' => time() + 3600,
                            'domain' => '',
                            'secure' => true,
                            'httponly' => true,
                            'samesite' => 'Strict'
                        ]
                    );
                }
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
                        <br>
                        <label for="recordar">¿Recordar usuario?
                            <input type="checkbox" name="recordar" id="recordar">
                        </label>
                    </form>
                </body>
    </html>