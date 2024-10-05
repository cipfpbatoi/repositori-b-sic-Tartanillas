<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ahorcado</title>
</head>
<style>
    .correct { color: green; }
    .incorrect { color: red; }
</style>
<body>
    <?php
    require 'functions.php';
    $letra = "";
    $error = "";
    $historialDeLetras = "";
    $palabraSecreta = "Euforia";
    $palabraEnGuiones = ["_", "_", "_", "_", "_", "_", "_"];
    
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $letra = htmlspecialchars($_POST['letra']);
            if (empty($letra)) {
                $error = "Por favor, inserta una letra.";
            } elseif(!imprimirArray($palabraSecreta, $letra, $palabraEnGuiones)) {
                $error = "La letra $letra no está en la palabra.";
            } else {
                $historialDeLetras = "Historial de letras correctas: " . strtolower($letra);
            }
        }
        
    ?>
    
    <form action="" method="post" enctype="multipart/form-data">
            <?php foreach ($palabraEnGuiones as $hueco) { 
                echo $hueco . " ";
            } ?>
            <br><br>
            <label for="letra">Introduce una letra: </label>
            <input type="text" id="letra" name="letra" value="<?= $letra ?>" maxlength="1">
            <span class="incorrect"><?= $error ?></span>
            <span class="correct"><?= $historialDeLetras ?></span>
            <br><br><button type="submit">Probar letra</button>
    </form>
</body>
</html>
