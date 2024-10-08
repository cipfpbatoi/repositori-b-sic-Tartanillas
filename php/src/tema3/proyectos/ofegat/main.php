<?php
require 'functions.php';

$letra = "";
$error = "";
$palabraSecreta = "Euforia";
$letrasAdivinadas = array();
$letrasFallidas = array();

if (empty($letrasAdivinadas)) {
    for ($i = 0; $i < strlen($palabraSecreta); $i++) {
        $letrasAdivinadas[$i] = "_";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $letra = htmlspecialchars($_POST['letra']);
    if (empty($letra)) {
        $error = "Por favor, inserta una letra.";
    } else {
        $letraCorrecta = imprimirArray($palabraSecreta, $letra, $letrasAdivinadas);
        if (!$letraCorrecta) {
            $error = "La letra $letra no está en la palabra.";
        }
    }
}

foreach ($letrasAdivinadas as $letraAdivinada) {
    echo $letraAdivinada . " ";
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ahorcado</title>
</head>
<style>
    .correct {
        color: green;
    }

    .incorrect {
        color: red;
    }
</style>

<body>
    <form action="" method="post" enctype="multipart/form-data">
        <br><br>
        <label for="letra">Introduce una letra: </label>
        <input type="text" id="letra" name="letra" value="<?= $letra ?>" maxlength="1">
        <span class="incorrect"><?= $error ?></span>
        <br><br><button type="submit">Probar letra</button>
        <br><br><a href="../login.php">Volver al menú principal</a>
    </form>
</body>

</html>