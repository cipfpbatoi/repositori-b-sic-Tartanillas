<?php
    session_start();
    unset($_SESSION['4_en_ratlla']);
    header('Location: ./main.php');
    exit();
?>