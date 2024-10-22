<?php
    function CalcularIrpf($salario) {
        $salario_final = null;
        
        $tramo1 = (12450 * 0.19);
        $tramo2 = ((20200 - 12450) * 0.24);
        $tramo3 = ((35200 - 20200) * 0.30);
        $tramo4 = ((60000 - 35200) * 0.37);
        $tramo5 = ((300000 - 60000) * 0.45);

        if($salario <= 12450) {
            $salario_final = $salario - ($salario * 0.19);
        } elseif ($salario > 12450 && $salario <= 20200) {
            $salario_final = $salario 
                - $tramo1 
                - (($salario - 12450) * 0.24); 
        } elseif ($salario > 20200 && $salario <= 35200) {
            $salario_final = $salario
                - $tramo1
                - $tramo2
                - (($salario - 20200) * 0.30);
        } elseif ($salario > 35200 && $salario <= 60000) {
            $salario_final = $salario 
                - $tramo1
                - $tramo2 
                - $tramo3
                - (($salario - 35200) * 0.37);
        } elseif ($salario > 60000 && $salario <= 300000) {
            $salario_final = $salario 
                - $tramo1
                - $tramo2 
                - $tramo3
                - $tramo4
                - (($salario - 60000) * 0.45);
        } else {
            $salario_final = $salario
                - $tramo1
                - $tramo2 
                - $tramo3
                - $tramo4
                - $tramo5
                - (($salario - 300000) * 0.47);
        }

        echo "<h3>El salario neto de $salario es $salario_final</h3>";
    }

    function CalcularIva($precio, $iva) {
        define("GENERAL", 1.21);
        define("REDUCIDO", 1.1);
        define("SUPERREDUCIDO", 1.04);

        $pvp = match($iva) {
            "general" => $precio * GENERAL,
            "reducido" => $precio * REDUCIDO,
            "superreducido" => $precio * SUPERREDUCIDO
        };

        echo "<h3> El PVP es $pvp </h3>";
    }

    function CalcularPrimos($desde, $hasta) {
        echo "<ul>";
        for($i = $desde; $i <= $hasta; $i++) {
            $esPrimo = TRUE;
            for($j = 2; $j < $i; $j++) {
                if($i % $j == 0) {
                    $esPrimo = FALSE;
                    break;
                }
            }
            if($esPrimo) {
                echo "<li>$i</li>";
            }
        }
        echo "</ul>";
    }

    function CalcularTemp($temperatura, $unidad_inicial, $unidad_final) {
        if ($unidad_inicial == $unidad_final) {
            $temperatura_final = $temperatura; 
        }
    
        if ($unidad_inicial == "Fahrenheit") {
            $temperatura_final = ($temperatura - 32) * 5 / 9;
        } elseif ($unidad_inicial == "Kelvin") {
            $temperatura_final = $temperatura - 273.15;
        }
    
        if ($unidad_final == "Fahrenheit") {
            $temperatura_final = ($temperatura + 32) * 9 / 5;
        } elseif ($unidad_final == "Kelvin") {
            $temperatura_final = $temperatura + 273.15;
        }
        echo "<h3>$temperatura $unidad_inicial es equivalente a $temperatura_final $unidad_final</h3>";
    }
?>