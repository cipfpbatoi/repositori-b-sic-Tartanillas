<?php session_start();
if (isset($_SESSION['carrito'])){
    $carrito = $_SESSION['carrito'];
}

if (isset($_GET['el'])){
    $productoAEliminar = $_GET['el'];
    if($carrito[$productoAEliminar] >= 1) {
        $carrito[$productoAEliminar]--;
    } else {
        echo '<span>No puedes tener números negativos<span>';
    }
    $_SESSION['carrito'] = $carrito;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
</head>
<body>
<h1>Meter productos al carro</h1>
<?php 
    foreach($carrito as $producto => $cantidad){ ?>
        <?= $producto ?>: <?= $cantidad ?> <a href="carret.php?el=<?= $producto ?>">Eliminar</a><br>
    <?php } ?>

<br>

<a href = "./main.php" > Volver al menu principal </a>
</body>
</html>