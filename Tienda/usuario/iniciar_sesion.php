<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilos.css">
    <title>Iniciar sesión</title>
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 ); 
        
        require('../util/conexion.php');
    ?>
</head>
<body>
    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $usuario = $_POST["usuario"];
        $contrasena = $_POST["contrasena"];

        $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
        $resultado = $_conexion -> query($sql);
        if($resultado -> num_rows == 0) {
            $err_usuario = "El usuario no existe";
        } else {
            $info_usuario = $resultado -> fetch_assoc();
            $acceso_concedido = password_verify($contrasena,$info_usuario["contrasena"]);
            if(!$acceso_concedido) {
                $err_contrasena = "<p>Contraseña equivocada</p>";
            } else {
                session_start();
                $_SESSION["usuario"] = $usuario;
                header("location: ../index.php");
            }
        }
    }
    ?>
    <header>
        <a class="btn_volver" href="../index.php"><ion-icon name="arrow-undo-outline"></ion-icon></a>
        <h2 class="logo">Tienda</h2>
    </header>
    <div class="contenerdor">
        <div class="caja-form">
            <h2>Login</h2>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="caja-input">
                    <span class="icon"><ion-icon name="person-outline"></ion-icon></span>
                    <input name="usuario" type="text">
                    <?php if(isset($err_usuario)) echo "<span class='err'>$err_usuario</span>" ?>
                    <label>Usuario</label>
                </div>
                <div class="caja-input">
                    <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
                    <input name="contrasena" type="password">
                    <?php if(isset($err_contrasena)) echo "<span class='err'>$err_contrasena</span>" ?>
                    <label>Contraseña</label>
                </div>
                <input class="btn" type="submit" value="Iniciar sesión">
                <div class="login-register">
                    <p>No tienes una cuenta?
                        <a href="registro.php" class="registrar">Sign Up</a>
                    </p>
                </div>
            </form>
        </div> 
    </div>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>