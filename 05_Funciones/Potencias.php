<?php
    function comprobarEdad($base, $exponente) {
        if($base != '' && $exponente != '') echo "<h2> El resultado del exponente es: " . pow($base, $exponente) . "</h2>";
        else echo '<h2> Introduce la base y el exponente </h2>';
    }
?>