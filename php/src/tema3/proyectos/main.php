<?php
    session_start();
    if (isset($_COOKIE['recordar'])) {
        $_SESSION['usuario'] = $_COOKIE['recordar'];
    }
    $usuarios = [
        "miguel" => "1234",
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
                if(isset($_POST['recordar'])) {
                    setcookie(
                        'recordar',
                        $usuario,
                        [
                            'expires' => time() + 3600,
                            'secure' => true,
                            'httponly' => true,
                            'samesite' => 'Strict'
                        ]
                    );
                }
                header('Location: main.php');
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
                    <?php 
                        if(!isset($_SESSION['usuario'])) { ?>
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
                        <br>
                    </form>
                    <?php } else {
                        $usuario = $_SESSION['usuario']; ?>
                            <h1>¡Bienvenido <?= $usuario ?>!</h1>
                            <h3>¿A qué quieres jugar?</h3>
                            <table border="1">
                                <tr>
                                    <th style="padding: 10px;"><a href="./ofegat/main.php">Ofegat</a></th>
                                    <th style="padding: 10px;"><a href="./4_en_ratlla/main.php">4 en ratlla</a></th>
                                </tr>
                            </table>
                            <br>
                            <a href="./logout.php">Cerrar sesión</a>
                    <?php } ?>
                    
                </body>
    </html>