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

        session_start();
        if(!isset($_SESSION["usuario"])) {
            header("location: users/LogIn.php");
            exit;
        }
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
        <h2>Bienvenid@ <?php echo $_SESSION["usuario"] ?></h2>
        <a href="users/LogOut.php" class="btn btn-danger">Cerrar Sesion</a>
        <h1>Listado de Animes</h1>
        <?php
            if($_SERVER["REQUEST_METHOD"] == "POST") {
                $id_anime = $_POST["id_anime"];
                $sql = "DELETE FROM animes WHERE id_anime = '$id_anime'";
            }

            $sql = "SELECT * FROM animes";
            $resultado = $_conexion -> query($sql);
        ?>
        <a class="btn btn-secondary" href="nuevo_anime.php">Nuevo anime</a>
        <br>
        <br>
        <table class="table table-striped">
            <thead class="table-primary">
                <tr>
                    <th>Título</th>
                    <th>Estudio</th>
                    <th>Año</th>
                    <th>Número de temporadas</th>
                    <th>Portada</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while($fila = $resultado -> fetch_assoc()) {
                        // ["titulo"=>"Frieren","nombre_estudio"="Pierrot"...]
                        echo "<tr>";
                        echo "<td>" . $fila["titulo"] . "</td>";
                        echo "<td>" . $fila["nombre_estudio"] . "</td>";
                        echo "<td>" . $fila["anno_estreno"] . "</td>";
                        echo "<td>" . $fila["num_temporadas"] . "</td>";
                        ?>
                        <td>
                            <img src="<?php echo $fila["imagen"] ?>">
                        </td>
                        <td>
                            <a class="btn btn-primary" href="editar_anime.php?id_anime=<?php echo $fila["id_anime"] ?>">Editar</a>
                        </td>
                        <td>
                            <form action="" method="post">
                                <input type="hidden" name="id_anime" value="<?php echo $fila["id_anime"] ?>">
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