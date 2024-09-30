<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Alta Llibre</title>
</head>
<body>

<?php
$modulos = ["Repugnancia", "Abaricia", "Milagritos"];
$estados = ["Nuevo", "Seminuevo", "Viejo"];
$editorial = "";
$precio = "";
$paginas = "";
$error = "";
$comentarios = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $module = $_POST['module'];
    $editorial = htmlspecialchars($_POST['editorial']);
    $precio = htmlspecialchars($_POST['precio']);
    $paginas = htmlspecialchars($_POST['paginas']);
    $estado = isset($_POST['estado']) ? htmlspecialchars($_POST['estado']) : ' ';
    $foto = $_FILES['foto']['name'];
    $comentarios = htmlspecialchars($_POST['comentarios']);

    if (empty($module) || empty($editorial) || empty($precio) || empty($paginas) || empty($estado) || empty($foto) || empty($comentarios)) {
        $error = "Por favor, completa todos los campos.";
    }

    if (is_uploaded_file($_FILES['foto']['tmp_name'])) {
        $nombre = $_FILES['foto']['name'];
        move_uploaded_file($_FILES['foto']['tmp_name'], "./uploads/{$foto}");
        echo "<p>Archivo $ subido con éxito</p>";
    }
}
?>


    <form action="" method="post" enctype="multipart/form-data">
        <div>
            <label for="module">Módulo:</label><br>
            <select id="module" name="module">
                <?php foreach ($modulos as $modulo) { ?>
                    <option value="<?php echo $modulo ?>"><?php echo $modulo ?></option>
                <?php } ?>
            </select>
        </div>
        <div>
            <label for="editorial">Editorial:</label><br>
            <input type="text" id="editorial" name="editorial" value="<?php echo $editorial; ?>">
        </div>
        <div>
            <label for="precio">Precio:</label><br>
            <input type="text" id="precio" name="precio" value="<?php echo $precio; ?>">
        </div>
        <div>
            <label for="paginas">Páginas:</label><br>
            <input type="text" id="paginas" name="paginas" value="<?php echo $paginas; ?>">
        </div>
        <div>
            <label for="estado">Estado:</label><br>
            <?php foreach ($estados as $est) { ?>
                <input type="radio" name="estado" value="<?php echo $est ?>"><?php echo $est ?><br>
            <?php } ?>
        </div>
        <div>
            <label for="foto">Foto:</label><br>
            <input type="file" id="foto" name="foto">
        </div>
        <div>
            <label for="comentarios">Comentarios:</label><br>
            <textarea id="comentarios" name="comentarios"><?php echo $comentarios; ?></textarea>
        </div>
        <div>
            <button type="submit">Dar de alta</button>
        </div>
    </form>

    <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($error)) { ?>
        <h2>Datos enviados:</h2>
        <p>Módulo: <?php echo $module; ?></p>
        <p>Editorial: <?php echo $editorial; ?></p>
        <p>Precio: <?php echo $precio; ?></p>
        <p>Páginas: <?php echo $paginas; ?></p>
        <p>Estado: <?php echo $estado; ?></p>
        <p>Foto subida: <img src="./uploads/<?= $foto ?>"> </p>
        <p>Comentarios: <?php echo $comentarios; ?></p>
    <?php } else {
        echo "<br>" . $error;
    } ?>

</body>
</html>
