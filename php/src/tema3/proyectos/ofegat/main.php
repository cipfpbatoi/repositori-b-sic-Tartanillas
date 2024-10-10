<?php
session_start();
//unset($_SESSION['juego']);
if (!isset($_SESSION['usuario'])) {
    header('Location: ../main.php');
    exit();
}
if (isset($_SESSION['juego'])) {
    $palabraSecreta = $_SESSION['juego']['palabraSecreta'];
    $letrasAdivinadas = $_SESSION['juego']['letrasAdivinadas'];
    $letrasIncorrectas = $_SESSION['juego']['letrasIncorrectas'];
    $intentos = $_SESSION['juego']['intentos'];
    $intentoActual = $_SESSION['juego']['intentoActual'];
} else {
    $palabraSecreta = "Euforia";
    $letrasAdivinadas = [];
    for ($i = 0; $i < strlen($palabraSecreta); $i++) {
        $letrasAdivinadas[$i] = "_";
    }
    $letrasIncorrectas = [];
    $intentos = 6;
    $intentoActual = 1;
}
require 'functions.php';

$letra = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $letra = htmlspecialchars($_POST['letra']);
    if (empty($letra)) {
        echo "Por favor, inserta una letra.";
    } else {
        $letraCorrecta = comprobarLetra($palabraSecreta, $letra, $letrasAdivinadas);
        if (!$letraCorrecta) {
            $letrasIncorrectas[] = $letra;
            $intentoActual++;
        }
    }
}
$_SESSION['juego']['letrasAdivinadas'] = $letrasAdivinadas;
$_SESSION['juego']['letrasIncorrectas'] = $letrasIncorrectas;
$_SESSION['juego']['palabraSecreta'] = $palabraSecreta;
$_SESSION['juego']['intentos'] = $intentos;
$_SESSION['juego']['intentoActual'] = $intentoActual;
if ($intentoActual <= $intentos) {

    foreach ($letrasAdivinadas as $letraAdivinada) {
        echo $letraAdivinada . " ";
    }
    echo '<pre style="display: inline;"><em>          Intento actual' . $intentoActual . '/' . $intentos . '</em></pre>';
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
    <?php
    if ($intentoActual <= $intentos) { ?>
        <form action="" method="post" enctype="multipart/form-data">
            <label for="letra">Introduce una letra </label>
            <input type="text" id="letra" name="letra" value="<?= $letra ?>" maxlength="1">
            <button type="submit">Probar letra</button>
            <!-- Lógica para reiniciar el juego. -->
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
        <a href="../main.php">Volver al menú principal</a>
    <?php } else { ?>
        <h3 class="incorrect">Has perdido, has superado el máximo de intentos.</h3>
        <!-- Lógica para reiniciar el juego. -->
    <?php } ?>

</body>

</html>