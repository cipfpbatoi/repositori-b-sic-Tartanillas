<?php
require 'functions.php';

$palabraSecreta = "Euforia";
$letra = "";
$letrasAdivinadas = [];
$letrasIncorrectas = [];

for ($i = 0; $i < strlen($palabraSecreta); $i++) {
    $letrasAdivinadas[$i] = "_";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $letra = htmlspecialchars($_POST['letra']);
    if (empty($letra)) {
        $error = "Por favor, inserta una letra.";
    } else {
        $letraCorrecta = imprimirArray($palabraSecreta, $letra, $letrasAdivinadas);
        if (!$letraCorrecta) {
            $letrasIncorrectas[] = $letra;
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
        <label for="letra">Introduce una letra: </label>
        <input type="text" id="letra" name="letra" value="<?= $letra ?>" maxlength="1">
        <br><br>
        <button type="submit">Probar letra</button>
        <br><br>
        <h3>Letras correctas</h3>
        <span class="correct">
            <?php foreach ($letrasAdivinadas as $letraAdivinada) {
                if ($letraAdivinada != "_") {
                    echo $letraAdivinada . " ";
                }
            } ?>
        </span>
        <h3>Letras incorrectas</h3>
        <span class="incorrect">
            <?php foreach ($letrasIncorrectas as $letraIncorrecta) {
                echo $letraIncorrecta . " ";
            } ?>
        </span>
    </form>
</body>

</html>