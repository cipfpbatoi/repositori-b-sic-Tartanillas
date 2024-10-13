<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: ../main.php');
    exit();
}
require './functions.php';
if (isset($_SESSION['4_en_ratlla'])) {
    $jugador1 = $_SESSION['4_en_ratlla']['jugador1'];
    $jugador2 = $_SESSION['4_en_ratlla']['jugador2'];
    $jugadorActual = $_SESSION['4_en_ratlla']['jugadorActual'];
    $tabla = $_SESSION['4_en_ratlla']['tabla'];
} else {

    $jugador1 = 1;
    $jugador2 = 2;
    $jugadorActual = $jugador1;
    $tabla = inicializarTabla();
}
$columna = "";
$acabarJuego = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $columna = $_POST['columna'] - 1;
    $movimiento = hacerMovimiento($tabla, $columna, $jugadorActual);
    if ($movimiento == true) {
        if (comprobarVictoria($tabla, $jugadorActual)) {
            $acabarJuego = '<span class="correct">El jugador <b>' . $jugadorActual . '</b> ha ganado la partida.</span><br>';
        } elseif (comprobarTableroLleno($tabla)) {
            $acabarJuego =  '<span class="incorrect">El tablero está lleno</span><br>';
        } else {
            $jugadorActual = ($jugadorActual == $jugador1) ? $jugador2 : $jugador1;
        }
    }
    actualizarSesion($jugador1, $jugador2, $jugadorActual, $tabla);
}
if($acabarJuego == "") {
    pintarTabla($tabla);   
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>4 en ralla</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <?php
        if($acabarJuego != "") {
            echo $acabarJuego;
        } else { ?>
    <form action="" method="post">
        <label for="columna">Elige una columna (1-7):</label>
        <input type="number" id="columna" name="columna" min="1" max="7" required>
        <button type="submit">Hacer movimiento</button>
        <?php if($jugadorActual === $jugador1) { ?>
            <span class="jugador1">Turno del jugador 1 (rojo)</span>
        <?php } else { ?>
            <span class="jugador2">Turno del jugador 2 (amarillo)</span>
        <?php } ?>
        <br>
    </form>
    <?php } ?>
        <a href="./reiniciar.php">Reiniciar juego</a><br>
        <a href="../logout.php">Cerrar sesión</a><br>
        <a href="../main.php">Volver al menú principal</a>
</body>

</html>