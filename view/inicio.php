<?php
session_start();

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: ../');
    exit();
}
$nombre = $_SESSION["nombre"];
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>One Contact - Auditoria</title>
    <link rel="shortcut icon" href="../img/auditor.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/styles.css">

</head>

<body>
    <div class="menu">
        <ion-icon name="menu-outline"></ion-icon>
        <ion-icon name="close-outline"></ion-icon>
    </div>

    <div class="barra-lateral">
        <div>
            <div class="nombre-pagina">
                <ion-icon id="cloud" name="cloud-outline"></ion-icon>
                <span>One Contact</span>
            </div>
            <button class="boton">
                <ion-icon name="add-circle-outline"></ion-icon>
                <span>Create new</span>
            </button>
        </div>

        <nav class="navegacion">
            <ul>
                <li>
                    <a href="#" data-page="tabla">
                        <ion-icon name="list-outline"></ion-icon>
                        <span>Tabla</span>
                    </a>
                </li>

                <li>
                    <a href="#" data-page="motivo">
                        <ion-icon name="add-circle-outline"></ion-icon>
                        <span>Nuevo Motivo</span>
                    </a>
                </li>

                <li>
                    <a href="#" data-page="tabla_motivos">
                        <ion-icon name="list-outline"></ion-icon>
                        <span>Tabla Motivos</span>
                    </a>
                </li>
            </ul>
        </nav>

        <div>
            <div class="linea"></div>
            <div class="modo-oscuro">
                <div class="info">
                    <ion-icon name="moon-outline"></ion-icon>
                    <span>Dark Mode</span>
                </div>
                <div class="switch">
                    <div class="base">
                        <div class="circulo"></div>
                    </div>
                </div>
            </div>

            <div class="usuario">
                <img src="../img/logo-removebg-preview.png" alt="">
                <div class="info-usuario">
                    <div class="nombre-email">
                        <span class="nombre"><?php echo $nombre; ?></span>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <main class="main" id="main"></main>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="../js/script.js"></script>
</body>

</html>