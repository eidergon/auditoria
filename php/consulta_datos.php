<?php
include_once 'conexion.php';
$documento = $_GET['documento'];

$servername = "10.206.173.188:3306";
$username = "mysqldb";
$password = "0n3C0nt4ct1nt3rn4c10n4l.06++";
$database = "nomina";

// Crear la conexión
$conn2 = mysqli_connect($servername, $username, $password, $database);

// Verificar la conexión
if (!$conn2) {
    die("Error de conexión: " . mysqli_connect_error());
} else {

    $sql = "SELECT * FROM login WHERE Cc_user = '$documento'";
    $result = mysqli_query($conn2, $sql);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        
        echo json_encode($row);
    } else {
        echo "Error en la consulta: " . mysqli_error($conn2);
    }

    // Liberar el resultado
    mysqli_free_result($result);
}

// Cerrar la conexión
mysqli_close($conn2);
?>
