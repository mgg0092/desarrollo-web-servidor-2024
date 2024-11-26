<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 ); 
        
        require('conexion.php');
    ?>
    <style>
        .table-primary {
            --bs-table-bg: #b0008e;
            color: white;
        }
        img {
            width: 50px;
            height: 80px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Listado de Consolas</h1>
        <?php
            if($_SERVER["REQUEST_METHOD"] == "POST") {
                $id_consola = $_POST["id_consola"];
                $sql = "DELETE FROM consolas WHERE id_consola = '$id_consola'";
            }

            $sql = "SELECT * FROM consolas";
            $resultado = $_conexion -> query($sql);
        ?>
        <a class="btn btn-secondary" href="nueva_consola.php">Nueva consola</a>
        <br>
        <br>
        <table class="table table-striped">
            <thead class="table-primary">
                <tr>
                    <th>Nombre</th>
                    <th>Fabricante</th>
                    <th>Generacion</th>
                    <th>Unidades Vendidas</th>
                    <th>Portada</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while($fila = $resultado -> fetch_assoc()) {
                        // ["titulo"=>"Frieren","nombre_estudio"="Pierrot"...]
                        echo "<tr>";
                        echo "<td>" . $fila["nombre"] . "</td>";
                        echo "<td>" . $fila["fabricante"] . "</td>";
                        echo "<td>" . $fila["generacion"] . "</td>";
                        echo "<td>" . $fila["unidades_vendidas"] . "</td>";
                        ?>
                        <td>
                            <img src="<?php echo $fila["imagen"] ?>">
                        </td>
                        <td>
                            <form action="" method="post">
                                <input type="hidden" name="id_consola" value="<?php echo $fila["id_consola"] ?>">
                                <input class="btn btn-danger" type="submit" value="Borrar">
                            </form>
                        </td>
                        <?php
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>