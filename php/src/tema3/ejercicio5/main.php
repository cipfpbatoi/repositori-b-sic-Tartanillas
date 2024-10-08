<?php
session_start();
//unset($_SESSION['historial']);
if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit();
}
if (!isset($_SESSION['historial'])) {
    $_SESSION['historial'] = [];
}
$historial = $_SESSION['historial'];
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Páginas</title>
</head>

<body>


    <h1>Páginas a visitar</h1>
        <a href="../ejercicio1/main.php">Ejercicio 1</a>
        <br>
        <a href="../ejercicio2/login.php">Ejercicio 2</a>
        <br>
        <a href="../ejercicio3/login.php">Ejercicio 3</a>
        <br>
        <a href="../ejercicio4/main.php">Ejercicio 4</a>
    <br><br>
    <a href="historial.php">Ver historial</a>
</body>

</html>