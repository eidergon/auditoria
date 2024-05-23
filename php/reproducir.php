<?php
// Conexión a la base de datos (debes definir las credenciales y la conexión a tu base de datos)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "auditoria";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica la conexión
if ($conn->connect_error) {
    die("Error en la conexión a la base de datos: " . $conn->connect_error);
}

// Verifica si se proporciona un ID válido
if(isset($_GET['id']) && is_numeric($_GET['id'])) {
    $audioId = $_GET['id'];
    
    // Consulta para obtener los datos del archivo de audio
    $stmt = $conn->prepare("SELECT nombre_archivo, tipo_archivo, datos_archivo FROM datos_auditoria WHERE id = ?");
    $stmt->bind_param("i", $audioId);
    $stmt->execute();
    $stmt->store_result();
    
    // Verifica si se encontró el audio
    if($stmt->num_rows > 0) {
        $stmt->bind_result($nombreArchivo, $tipoArchivo, $datosArchivo);
        $stmt->fetch();
        
        // Envía los encabezados adecuados para el tipo de archivo
        header("Content-Type: $tipoArchivo");
        header("Content-Disposition: inline; filename=$nombreArchivo");
        
        // Imprime los datos del archivo
        echo $datosArchivo;
    } else {
        echo "El audio no se encontró.";
    }
} else {
    echo "ID de audio no válido.";
}

$stmt->close();
$conn->close();
?>
