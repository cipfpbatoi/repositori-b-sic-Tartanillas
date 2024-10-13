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
    $_SESSION['ofegat']['letrasAdivinadas'] = $letrasAdivinadas;
    $_SESSION['ofegat']['letrasIncorrectas'] = $letrasIncorrectas;
    $_SESSION['ofegat']['palabraSecreta'] = $palabraSecreta;
    $_SESSION['ofegat']['intentos'] = $intentos;
    $_SESSION['ofegat']['intentoActual'] = $intentoActual;
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