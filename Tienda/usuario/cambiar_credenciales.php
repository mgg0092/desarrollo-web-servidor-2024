<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilos.css">
    <title>Cambiar Credenciales</title>
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
    <div class="container">
        <?php
            if($_SERVER["REQUEST_METHOD"] == "POST") {
                $usuario = $_POST["usuario"];
                $tmp_contrasena = $_POST["contrasena"];

                if($tmp_contrasena == ""){
                    $err_contrasena = "El campo contrasena es obligatorio";
                } elseif (strlen($tmp_contrasena) < 8|| strlen($tmp_contrasena) > 15) {
                    $err_contrasena = "El campo contrasena debe tener entre 8 y 15 caracteres";
                } elseif (!preg_match("/[a-zA-Z0-9!-\/:-@-`-~]+$/", $tmp_contrasena)) {
                    $err_contrasena = "El campo contrasena solo puede tener letras(Mayus o Minus), numeros y letras especiales";
                } else {
                    $contrasena = $tmp_contrasena;
                }

                if(isset($contrasena)) {
                    $contrasena_cifrada = password_hash($contrasena, PASSWORD_DEFAULT);
        
                    $sql = "UPDATE usuarios SET contrasena = '$contrasena_cifrada' WHERE usuario = '$usuario'";
                    
                    $_conexion -> query($sql);

                    session_start();
                    session_destroy();
                    header("location: iniciar_sesion.php");
                    exit;
                }
            }

            $usuario = $_GET["usuario"];
            $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
            $resultado = $_conexion -> query($sql);
            $usuario = $resultado -> fetch_assoc();
        ?>
    <header>
        <a class="btn_volver" href="../index.php"><ion-icon name="arrow-undo-outline"></ion-icon></a>
        <h2 class="logo">Tienda</h2>
    </header>
    <div class="contenerdor">
        <div class="caja-form">
            <h2>Restablecer Contrasena</h2>
            <form action="" method="post">
                <div class="caja-input">
                    <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
                    <input type="password" name="contrasena">
                    <label>Nueva Contraseña</label>
                    <?php if(isset($err_contrasena)) echo "<span class='err'>$err_contrasena</span>" ?>
                </div>
                <input type="hidden" name="usuario" value="<?php echo $usuario["usuario"] ?>">
                    <input class="btn btn-primary" type="submit" value="Cambiar Contraseña">
                </div>
            </form>
        </div>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>