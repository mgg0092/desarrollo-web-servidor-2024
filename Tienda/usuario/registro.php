<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="../css/estilos.css">
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 ); 
        
        require('../util/conexion.php');
    ?>
</head>
<body>
    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $tmp_usuario = $_POST["usuario"];
        $tmp_contrasena = $_POST["contrasena"];

        $usuario_filtrada = $_conexion -> real_escape_string($tmp_usuario);
        $sql = "SELECT COUNT(*) AS total FROM usuarios WHERE usuario = '$usuario_filtrada'";
        $resultado = $_conexion -> query($sql);
        $fila = $resultado -> fetch_assoc();

        if($tmp_usuario == "") {
            $err_usuario = "El campo usuario es obligatorio";
        } elseif (strlen($tmp_usuario) < 3 || strlen($tmp_usuario) > 15 ) {
            $err_usuario = "El campo usuario solo puede tener entre 3 y 15 caracteres";
        } elseif (!preg_match("/^[a-zA-Z0-9]+$/", $tmp_usuario)) {
            $err_usuario = "El campo usuario solo puede contener letras y numeros";
        } elseif($fila['total'] > 0) {
            $err_usuario = "El usuario introducido ya esta en la base de datos";
        }else {
            $usuario = $tmp_usuario;
        }
        
        if($tmp_contrasena == ""){
            $err_contrasena = "El campo contrasena es obligatorio";
        } elseif (strlen($tmp_contrasena) < 8|| strlen($tmp_contrasena) > 15) {
            $err_contrasena = "El campo contrasena debe tener entre 8 y 15 caracteres";
        } elseif (!preg_match("/[a-zA-Z0-9!-\/:-@-`-~]+$/", $tmp_contrasena)) {
            $err_contrasena = "El campo contrasena solo puede tener letras(Mayus o Minus), numeros y letras especiales";
        } else {
            $contrasena = $tmp_contrasena;
        }

        if(isset($usuario) && isset($contrasena)) {
            $contrasena_cifrada = password_hash($contrasena, PASSWORD_DEFAULT);

            $sql = "INSERT INTO usuarios VALUES ('$usuario', '$contrasena_cifrada')";

            $_conexion -> query($sql);
        }
    }
    ?>
    <header>
        <a class="btn_volver" href="../index.php"><ion-icon name="arrow-undo-outline"></ion-icon></a>
        <h2 class="logo">Tienda</h2>
    </header>
    <div class="contenerdor">
        <div class="caja-form">
            <h2>Sign Up</h2>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="caja-input">
                    <span class="icon"><ion-icon name="person-outline"></ion-icon></span>
                    <input name="usuario" type="text">
                    <label >Usuario</label>
                    <?php if(isset($err_usuario)) echo "<span class='err'>$err_usuario</span>" ?>
                </div>
                <div class="caja-input">
                    <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
                    <input name="contrasena" type="password">
                    <label>Contraseña</label>
                    <?php if(isset($err_contrasena)) echo "<span class='err'>$err_contrasena</span>" ?>
                </div>
                <input class="btn" type="submit" value="Registarse">
                <div class="login-register">
                    <p>Tienes una cuenta?
                        <a href="iniciar_sesion.php" class="registrar">Login</a>
                    </p>
                </div>
            </form>
        </div>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>