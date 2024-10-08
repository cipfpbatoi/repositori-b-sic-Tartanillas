<?php 
session_start();
//unset($_SESSION['carrito']);
if (isset($_SESSION['carrito'])){
    $carrito = $_SESSION['carrito'];
}else{
    $carrito = [];
}

if(isset($_SESSION['historial'])) {
    $historial = $_SESSION['historial'];
    if(array_key_exists("Ofegat", $historial)) {
        $historial["Ofegat"]++;
    } else {
        $historial["Ofegat"] = 1;
    }
    $_SESSION['historial'] = $historial;
}

if (isset($_POST['producto'])){
    $producto = $_POST['producto'];
    if (isset($carrito[$producto])){
        $carrito[$producto]++;
    } else {
        $carrito[$producto] = 1;
    }
    $_SESSION['carrito'] = $carrito;
}



?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 1</title>
</head>
<body>


    <h1>Meter productos al carro</h1>
    <form method="POST">
        <label for="producto">Elige un producto:</label>
        <select name="producto" id="producto">
            <option value="manzana">Manzana</option>
            <option value="platano">Platano</option>
            <option value="naranja">Naranja</option>
        </select>
        <input type="submit" value="Afegir al carret">
    </form>
    <a href="carret.php">Ver carrito</a>
    <br>
    <a href="../ejercicio5/main.php">Ir al historial</a>
</body>
</html>