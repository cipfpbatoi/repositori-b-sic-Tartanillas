<?php 
function comprobarLetra($palabraSecreta, $letraUsuario, &$arrayAdivinadas) {
    $letraCorrecta = false;
    for ($i = 0; $i < strlen($palabraSecreta); $i++) {
        if (strtolower($letraUsuario) === strtolower($palabraSecreta[$i])) {
            $arrayAdivinadas[$i] = strtolower($letraUsuario);
            $letraCorrecta = true;
        }
    }
    return $letraCorrecta;
}

function actualizarSesion($palabraSecreta, $letrasAdivinadas, $letrasIncorrectas, $intentos, $intentoActual) {
    $_SESSION['juego']['letrasAdivinadas'] = $letrasAdivinadas;
    $_SESSION['juego']['letrasIncorrectas'] = $letrasIncorrectas;
    $_SESSION['juego']['palabraSecreta'] = $palabraSecreta;
    $_SESSION['juego']['intentos'] = $intentos;
    $_SESSION['juego']['intentoActual'] = $intentoActual;
}

function haGanado($letrasAdivinadas) {
    foreach ($letrasAdivinadas as $letra) {
        if ($letra === "_") {
            return false;
        }
    }
    return true;
}
?>