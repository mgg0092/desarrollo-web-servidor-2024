<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilos.css">
    <title>Productos</title>
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
            $id_producto = $_POST["id_producto"];
            // $sql = "DELETE FROM productos WHERE id_producto = '$id_producto'";
            // $_conexion -> query($sql);

            $sql = $_conexion -> prepare("DELETE FROM productos WHERE id_producto = ?");
            
            $sql -> bin_param("i", $id_producto);

            $sql -> execute();
        }
        
        $sql = "SELECT * FROM productos";
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
                    <a class="" href="../categorias/index.php">Categorias</a>
                    <ul class="dropdown">
                        <li>
                            <a href="../categorias/nueva_categoria.php">Categoria Nueva</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-link productos">
                    <a class="" href="index.php">Productos</a>
                    <ul class="dropdown">
                        <li>
                            <a href="nuevo_producto.php">Producto Nuevo</a>
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
        <h1>Tabla de los productos</h1>
        <div class="tabla-container">
            <table>
                <thead>
                    <th>Nombre</th>
                <th>Descripcion</th>
                <th>Categoria</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Imagen</th>
                <th></th>
                <th></th>
            </thead>
            <tbody>
                <?php
                    while($fila = $resultado -> fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $fila["nombre"] . "</td>";
                        echo "<td>" . $fila["descripcion"] . "</td>";
                        echo "<td>" . $fila["categoria"] . "</td>";
                        echo "<td>" . $fila["precio"] . "</td>";
                        echo "<td>" . $fila["stock"] . "</td>";
                    ?>
                    <td>
                        <img width="100px" src="<?php echo '../' . $fila["imagen"] ?>">
                    </td>
                    <td>
                        <a class="btn-editar" href="editar_producto.php?id_producto=<?php echo $fila["id_producto"] ?>">Editar</a>
                    </td>
                    <td>
                        <form action="" method="post">
                            <input type="hidden" name="id_producto" value="<?php echo $fila["id_producto"] ?>">
                            <input class="btn-borrar" type="submit" value="Borrar">
                        </form>
                    </td>
                    <?php
                    }
                ?>
            </tbody>
        </div>
    </div>
</body>
</html>