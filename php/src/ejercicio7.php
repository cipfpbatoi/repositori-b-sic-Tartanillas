<!DOCTYPE html>
    <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Ejercicio 7</title>
        </head>
                <body>
                <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = htmlspecialchars($_POST['nombre']);
        $email = htmlspecialchars($_POST['email']);
        $contrasenya = htmlspecialchars($_POST['contrasenya']);
        $contrasenyaRepetida = htmlspecialchars($_POST['contrasenyaRepetida']);
        $errors = [];
        if (empty($nombre) || empty($email) || empty($contrasenya) || empty($contrasenyaRepetida)) {
            $errors[] = "Por favor, completa todos los campos.";
        } 
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Dirección de correo inválida.";
        } 
        if ($contrasenya != $contrasenyaRepetida) {
            $errors[] = "Las contraseñas no coinciden.";
        }
        if(!empty($errors)) {
            foreach($errors as $error) {
                echo "<p>$error</p>";
            }
        } else {
            echo "<h2>Gracias por contactarnos!</h2>";
            echo "<p>Tu nombre: $nombre</p>";
            echo "<p>Tu correo electrónico: $email</p>";
        }
    } else {
        ?>
        <h2>Formulari de Contacte</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label for="nombre">Nombre:</label><br>
            <input type="text" id="nombre" name="nombre" required><br><br>
            <label for="email">Correo electrónico:</label><br>
            <input type="email" id="email" name="email" required><br><br>
            <label for="contrasenya">Contraseña:</label><br>
            <input type="password" id="contrasenya" name="contrasenya" required><br><br>
            <label for="contrasenyaRepetida">Repite contraseña:</label><br>
            <input type="password" id="contrasenyaRepetida" name="contrasenyaRepetida" required><br><br>
            <input type="submit" value="Enviar">
        </form>
        <?php
    }
    ?>
                </body>
    </html>