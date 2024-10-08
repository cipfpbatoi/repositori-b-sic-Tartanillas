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
    if($columna < 0 || $columna > 7) {
        echo "<span>Introduce una columna válida.</span>";
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
?>
