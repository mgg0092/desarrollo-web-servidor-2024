<?php
    function comprobarEdad($nombre, $edad) {
        if($nombre != '' && $edad != '') echo "<h2> $nombre is $edad age</h2>";
        else echo '<h2> Introduce tu nombre y edad </h2>';
    }
?>