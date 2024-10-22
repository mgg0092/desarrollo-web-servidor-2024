<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clases de la Semana</title>
</head>
<body>
    <?php
        $dia = date("l");
        echo "<h1>Hoy es $dia</h1>";
        
        $diaSpain;
        switch($dia) {
            case "Tuesday":
            case "Wednesday":
            case "Friday":
                echo "<p>El $dia hay clase de Web Servidor</p>";
                break;
            default:
                echo "<p>El $dia no hay clase de Web Servidor</p>";
        }


        switch($dia) {
            case "Monday":
                $diaSpain = "Lunes";
                break;
            case "Tuesday":
                $diaSpain = "Martes";
                break;
            case "Wednesday":
                $diaSpain = "Miercoles";
                break;
            case "Thursday":
                $diaSpain = "Jueves";
                break;
            case "Friday":
                $diaSpain = "Viernes";
                break;
            case "Saturday":
                $diaSpain = "Sabado";
                break;
            case "Sunday":
                $diaSpain = "Domingo";
                break;
        }

        switch($diaSpain) {
            case "Martes":
            case "Miercoles":
            case "Viernes":
                echo "<p>El $diaSpain hay clase de Web Servidor</p>";
                break;
            default:
                echo "<p>El $diaSpain no hay clase de Web Servidor</p>";
        }

        $resultado = match ($diaSpain) {
            "Martes", "Miercoles", "Viernes" => "<p>El $diaSpain hay clase de Web Servidor</p>",
            default => "<p>El $diaSpain no hay clase de Web Servidor</p>"
        };

        echo $resultado;
        ?>
</body>
</html>