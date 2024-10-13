<?php
    session_start();
    unset($_SESSION['ofegat']);
    header('Location: ./main.php');
    exit();
?>