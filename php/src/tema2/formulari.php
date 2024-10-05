<!DOCTYPE html>
    <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Formulari</title>
        </head>
                <body>
                <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = htmlspecialchars($_POST['email']);
        $missatge = htmlspecialchars($_POST['missatge']);

        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "<h2>Gràcies per contactar-nos!</h2>";
            echo "<p>El teu correu electrònic: $email</p>";
            echo "<p>El teu missatge: $missatge</p>";
        } else {
            echo "<p>Adreça de correu electrònic no vàlida. Si us plau, torna-ho a intentar.</p>";
        }
    } else {
        ?>
        <h2>Formulari de Contacte</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label for="email">Correu electrònic:</label>
            <input type="email" id="email" name="email" required><br><br>
            <label for="missatge">Missatge:</label><br>
            <textarea id="missatge" name="missatge" rows="4" cols="50" required></textarea><br><br>
            <input type="submit" value="Enviar">
        </form>
        <?php
    }
    ?>
                </body>
    </html>