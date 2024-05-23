<?php
session_start();

session_destroy();

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <link rel="shortcut icon" href="img/auditor.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <title>One Contact - Login Auditoria</title>
</head>
<body>
    <div class="box">
        <div class="container">
            <div class="top-header">
                <span>One Contact</span>
                <header>Iniciar Sesión</header>
            </div>

            <form id="loginForm" method="post">
                <div class="input-field">
                    <input type="text" class="input" name="user" placeholder="Usuario" required>
                    <i class="fa-solid fa-user"></i>
                </div>
                <div class="input-field">
                    <input type="password" class="input" name="pass" placeholder="Contraseña" required>
                    <i class="fa-solid fa-lock"></i>
                </div>
                <div class="input-field">
                    <input type="submit" class="submit" value="Inicio">
                </div>
            </form>

            <div class="bottom">
                <div class="left">
                    <input type="checkbox" id="check">
                    <label for="check"> Recordarme</label>
                </div>
                <div class="right">
                    <label id="contraseña">¿Olvidaste la contraseña?</label>
                </div>
            </div>
        </div>
    </div>

    <?php
    require_once 'php/conexion.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $user = $_POST["user"];
        $pass = $_POST["pass"];

        $query = "SELECT nombre FROM usuarios WHERE username = '$user' AND pass = '$pass'";
        $resultado = $conn->query($query);
        $row = $resultado->fetch_assoc();

        if ($resultado->num_rows > 0) {
            session_start();
            $_SESSION['logged_in'] = true;
            $_SESSION["nombre"] = $row["nombre"];
            header("Location: ./view/inicio.php");
            exit;
        } else {
            echo '<script>
                Swal.fire({
                    icon: "error",
                    title: "Error de autenticación",
                    text: "Credenciales incorrectas"
                });
                </script>';
        }

        $conn->close();
    }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>
