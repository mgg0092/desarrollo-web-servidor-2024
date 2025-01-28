<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilos.css">
    <title>Inicio</title>
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 ); 
        
        require('util/conexion.php');
        
        session_start();
    ?>
</head>
<body>
    <?php
        $sql = "SELECT * FROM productos";
        $resultado = $_conexion -> query($sql);
    ?>
    <header>
        <h2 class="logo">Tienda</h2>
        <nav class="navbar">
        <?php
            if(isset($_SESSION["usuario"])) { ?>
                            <ul class="nav-links">
                <li class="nav-link">
                    <a class="" href="../index.php">Inicio</a>
                </li>
                <li class="nav-link categoria">
                    <a class="" href="categorias/index.php">Categorias</a>
                    <ul class="dropdown">
                        <li>
                            <a href="categorias/nueva_categoria.php">Categoria Nueva</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-link productos">
                    <a class="" href="productos/index.php">Productos</a>
                    <ul class="dropdown">
                        <li>
                            <a href="productos/nuevo_producto.php">Producto Nuevo</a>
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
                            <a href="usuario/cerrar_sesion.php">Cerrar Sesión</a>
                        </li>
                    </ul>
                </li>
            </ul>
        <?php
            } else {
        ?>
            <ul class="nav-links">
                <li class="nav-link">
                    <a href="#">Inicio</a>
                </li>
                <li class="nav-link">
                    <a href="usuario/iniciar_sesion.php">Mi Cuenta</a> 
                </li>
            </ul>
        <?php
            }
        ?>
        </nav>
    </header>
    <div class="container">
    <h1>Lista de Productos</h1>
        <?php
            while($fila = $resultado -> fetch_assoc()) {
            echo "<div class='card'>";
            echo "<div class='caja-img'>";
            ?>
                <img src="<?php echo $fila["imagen"] ?>" alt="">
            <?php
            echo "</div>";
            echo "<div class='caja-contenido'>";
            echo "<h3>" . $fila["nombre"] . "</h3>";
            echo "<h2 class='precio'>". $fila["precio"] . " €</h2>";
            ?>
                <a href="" class="btn-compra">Comprar</a>
            <?php
            echo "</div>";
            echo "</div>";
            }
        ?>
        </div>
    </div>
</body>
</html>