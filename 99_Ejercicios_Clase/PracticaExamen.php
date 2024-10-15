<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="PracticaExamen.css">
    <title>Practica Examen</title>
</head>
<body>
    <table>
        <thead>
        </thead>
        <tbody>
            <?php
                for ($Multiplicando=1; $Multiplicando <= 10; $Multiplicando++) {
                    for ($Multiplicador=1; $Multiplicador <= 10 ; $Multiplicador++) { 
                        $Producto = $Multiplicando * $Multiplicador; ?>
                        <tr>
                            <td><?php echo $Multiplicando ?></td>
                            <td><?php echo $Multiplicador ?></td>
                            <td><?php echo $Producto ?></td>
                        </tr>
            <?php
                    }
                }             
            ?>
        </tbody>
    </table>
</body>
</html>