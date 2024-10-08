<?php 
function imprimirArray($palabraSecreta, $letraUsuario, &$arrayAdivinadas) {
    $letraCorrecta = false;
    for ($i = 0; $i < strlen($palabraSecreta); $i++) {
        if (strtolower($letraUsuario) === strtolower($palabraSecreta[$i])) {
            $arrayAdivinadas[$i] = strtolower($letraUsuario);
            $letraCorrecta = true;
        }
    }
    return $letraCorrecta;
}
?>