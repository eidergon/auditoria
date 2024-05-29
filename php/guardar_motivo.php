<?php
include_once 'conexion.php';

$response = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tipo_motivo = $_POST["tipo_motivo"];
    $motivo = $_POST["motivo"];

    $stmt = $conn->prepare("INSERT INTO $tipo_motivo (motivo) VALUES (?)");
    $stmt->bind_param("s", $motivo);

    if ($stmt->execute()) {
        $response['status'] = 'success';
        $response['message'] = 'Motivo Guardado.';
    } else {
        $response['status'] = 'error';
        $response['message'] = 'Error al guardar motivo ' . $conn->error;
    }

    $stmt->close();
} else {
    $response['status'] = 'error';
    $response['message'] = 'Método de solicitud incorrecto.';
}

header('Content-Type: application/json');
echo json_encode($response);
