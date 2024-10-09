<?php
    session_start();
    if(!isset($_SESSION['usuario'])) {
        header('Location: ../main.php');
        exit();
    }
    include './functions.php';
    $player1 = 1;
    $player2 = 2;
    $actualPlayer = $player1;
    $tabla = inicializarTabla();
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $columna = $_POST['columna'] - 1;
        $actualPlayer = $_POST['actualPlayer'];
        $movimiento = hacerMovimiento($tabla, $columna, $actualPlayer);
        if ($movimiento == true) {
            $actualPlayer = ($actualPlayer == $player1) ? $player2 : $player1;
        }
    }
    pintarTabla($tabla);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>4 en ralla</title>
</head>
<style>
    table { border-collapse: collapse; }
td {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    border: 10px dotted #fff; /* Cercle amb punts blancs */
    background-color: #000; /* Fons negre o pot ser un altre color */
    display: inline-block;
    margin: 10px;
    color: white;
    font-size: 2rem;
    text-align: center ;
    vertical-align: middle;
}
.player1 {
    background-color: red; /* Color vermell per un dels jugadors */
}
.player2 {
    background-color: yellow; /* Color groc per l'altre jugador */
}
.buid {
    background-color: white; /* Color blanc per cercles buits */
    border-color: #000; /* Puntes negres per millor visibilitat */
}
</style>
<body>

    <form action="" method="post">
        <label for="columna">Elige una columna (1-7):</label>
        <input type="number" id="columna" name="columna" min="1" max="7" required>
        <input type="hidden" name="actualPlayer" value="<?php echo $actualPlayer; ?>">
        <button type="submit">Hacer movimiento</button>
        <br><br>
        <a href="../main.php">Volver al menú principal</a>
    </form>

</form>
</body>
</html>
