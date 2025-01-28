<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilos.css">
    <title>Document</title>
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );
        
        require('../util/conexion.php');

        session_start();
        if(!isset($_SESSION["usuario"])) {
            header("location: ../usuario/iniciar_sesion.php");
            exit;
        }
    ?>
</head>
<body>
    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $categoria = $_POST["categoria"];
            $sql = "DELETE FROM categorias WHERE categoria = '$categoria'";
            $_conexion -> query($sql);
        }

        $sql = "SELECT * FROM categorias";
        $resultado = $_conexion -> query($sql);
    ?>
    <header>
        <h2 class="logo">Tienda</h2>
        <nav class="navbar">
            <ul class="nav-links">
                <li class="nav-link">
                    <a class="" href="../index.php">Inicio</a>
                </li>
                <li class="nav-link categoria">
                    <a class="" href="index.php">Categorias</a>
                    <ul class="dropdown">
                        <li>
                            <a href="nueva_categoria.php">Categoria Nueva</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-link productos">
                    <a class="" href="../productos/index.php">Productos</a>
                    <ul class="dropdown">
                        <li>
                            <a href="../productos/nuevo_producto.php">Producto Nuevo</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-link perfil">
                    <a href="#"><?php echo $_SESSION["usuario"] ?></a>
                    <ul class="dropdown">
                        <li>
                            <a href="../usuario/cambiar_credenciales.php?usuario=<?php echo $_SESSION["usuario"] ?>">Cambiar Contraseña</a>
                        </li>
                        <li>
                            <a href="../usuario/cerrar_sesion.php">Cerrar Sesión</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </header>
    <div class="container">
        <h1>Tabla de las categorias</h1>
        <table class="table table-stripped">
            <thead class="table-primary">
                <th>Categoria</th>
                <th>Descripcion</th>
                <th></th>
                <th></th>
            </thead>
            <tbody>
                <?php
                    while($fila = $resultado -> fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $fila["categoria"] . "</td>";
                        echo "<td>" . $fila["descripcion"] . "</td>";
                    ?>
                    <td>
                        <a class="btn btn-primary" href="editar_categoria.php?categoria=<?php echo $fila["categoria"] ?>">Editar</a>
                    </td>
                    <td>
                        <form action="" method="post">
                            <input type="hidden" name="categoria" value="<?php echo $fila["categoria"] ?>">
                            <input class="btn-borrar" type="submit" value="Borrar">
                        </form>
                    </td>
                    <?php
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>