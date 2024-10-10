<?php
    session_start();
    session_unset();
    session_destroy();
    /*if(isset($_COOKIE['recordar'])) {
        setcookie('recordar', "", 1);
    } */
    header('Location: main.php');
    exit();
?>