<?php
function inicializarTabla() {
    $filas = 6;
    $columnas = 7;
    $tabla = array();
    for ($fila = 0; $fila < $filas; $fila++) {
        for ($columna = 0; $columna < $columnas; $columna++) {
            $tabla[$fila][$columna] = 0;
        }
    }
    return $tabla;
}

function pintarTabla($tabla) {
    echo '<table>';
    echo '<tr>';
    for($i = 1; $i <= count($tabla) + 1; $i++) {
        echo "<td>$i</td>";
    }
    echo '</tr>';
    foreach ($tabla as $fila) {
        echo '<tr>';
        foreach ($fila as $celda) {
            if ($celda == 0) {
                echo '<td class="buid"></td>';
            } elseif ($celda == 1) {
                echo '<td class="player1"></td>';
            } else {
                echo '<td class="player2"></td>';
            }
        }
        echo '</tr>';
    }
    echo '</table>';
}

function hacerMovimiento(&$tabla, $columna, $jugadorActual) {
    if($columna < 0 || $columna >= 7) {
        echo '<span class="incorrect">Introduce una columna válida.</span>';
        return false;
    } else {
        for ($fila = count($tabla) - 1; $fila >= 0; $fila--) {
            if ($tabla[$fila][$columna] == 0) {
                $tabla[$fila][$columna] = $jugadorActual;
                return true;
            }
        }
        return false;
    }
}

function actualizarSesion($jugador1, $jugador2, $jugadorActual, $tabla) {
    $_SESSION['4_en_ratlla']['jugador1'] = $jugador1;
    $_SESSION['4_en_ratlla']['jugador2'] = $jugador2;
    $_SESSION['4_en_ratlla']['jugadorActual'] = $jugadorActual;
    $_SESSION['4_en_ratlla']['tabla'] = $tabla;
}

function comprobarVictoria($tabla, $jugadorActual) {
    $filas = count($tabla);
    $columnas = count($tabla[0]);
    
    //Horizontal
    for ($fila = 0; $fila < $filas; $fila++) {
        for ($columna = 0; $columna <= $columnas - 4; $columna++) {
            if ($tabla[$fila][$columna] == $jugadorActual && $tabla[$fila][$columna + 1] == $jugadorActual && $tabla[$fila][$columna + 2] == $jugadorActual && $tabla[$fila][$columna + 3] == $jugadorActual) {
                return true; 
            }
        }
    }

    // Vertical
    for ($columna = 0; $columna < $columnas; $columna++) {
        for ($fila = 0; $fila <= $filas - 4; $fila++) {
            if ($tabla[$fila][$columna] == $jugadorActual && $tabla[$fila + 1][$columna] == $jugadorActual && $tabla[$fila + 2][$columna] == $jugadorActual && $tabla[$fila + 3][$columna] == $jugadorActual) {
                return true; 
            }
        }
    }

    // Diagonal derecha
    for ($fila = 0; $fila <= $filas - 4; $fila++) {
        for ($columna = 0; $columna <= $columnas - 4; $columna++) {
            if ($tabla[$fila][$columna] == $jugadorActual && $tabla[$fila + 1][$columna + 1] == $jugadorActual && $tabla[$fila + 2][$columna + 2] == $jugadorActual && $tabla[$fila + 3][$columna + 3] == $jugadorActual) {
                return true; 
            }
        }
    }

    // Diagonal izquierda
    for ($fila = 3; $fila < $filas; $fila++) {
        for ($columna = 0; $columna <= $columnas - 4; $columna++) {
            if ($tabla[$fila][$columna] == $jugadorActual && $tabla[$fila - 1][$columna + 1] == $jugadorActual && $tabla[$fila - 2][$columna + 2] == $jugadorActual && $tabla[$fila - 3][$columna + 3] == $jugadorActual) {
                return true; 
            }
        }
    }

    return false; 
}

function comprobarTableroLleno($tabla) {
    foreach ($tabla as $fila) {
        foreach ($fila as $celda) {
            if ($celda == 0) {
                return false; 
            }
        }
    }
    return true;
}
?>
