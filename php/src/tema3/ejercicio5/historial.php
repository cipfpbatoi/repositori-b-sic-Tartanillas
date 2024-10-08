<?php session_start();
if (isset($_SESSION['historial'])) {
    $historial = $_SESSION['historial'];
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Páginas visitadas</title>
</head>

<body>
    <h1>Historial de páginas visitadas</h1>
    <table border="1">
        <?php foreach ($historial as $pagina => $visitas) { ?>
            <tr>
                <th><?= $pagina ?></th>
                <td><?= $visitas ?> </td>
            </tr>
        <?php } ?>
    </table>

    <br>

    <a href="./main.php"> Volver al menu principal </a>
</body>

</html>