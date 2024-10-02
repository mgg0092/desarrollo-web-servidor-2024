<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array Bidimensionales</title>
    <link rel="stylesheet" href="ArrayBi.css">
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );
    ?>
</head>
<body>
    <?php
        $videojuegos = [
            ["Fifa 24", "Deportes", 70],
            ["Dark Souls", "Soulslike", 50],
            ["Hollow Knigth", "Plataformas", 30]
        ];

        foreach ($videojuegos as $videojuego) {
            list($titulo, $categoria, $precio) = $videojuego;
            echo "<p>$titulo es un $categoria y cuesta $precio</p>";
        }
        ?>
        <table>
            <thead>
                <th>Titulo</th>
                <th>Categoria</th>
                <th>Precio</th>
            </thead>
            <tbody>
                <?php
                foreach($videojuegos as $videojuego) { 
                    list($titulo, $categoria, $precio) = $videojuego; ?>
                <tr>
                    <td><?php echo $titulo?></td>
                    <td><?php echo $categoria?></td>
                    <td><?php echo $precio?></td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
</body>
</html>