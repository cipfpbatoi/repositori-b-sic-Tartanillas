<?php
    session_start();
    unset($_SESSION['juego']);
    header('Location: ./main.php');
    exit();
?>