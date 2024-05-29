<?php
require_once 'conexion.php';
$id = $_GET['id'];
$tipo_motivo = $_GET['tipo_motivo'];
$response = array();

$sql_update = "DELETE FROM $tipo_motivo WHERE id = '$id'";
if ($conn->query($sql_update) === TRUE) {
    $response['status'] = 'success';
    $response['message'] = "Motivo Eliminado.";
} else {
    $response['status'] = 'error';
    $response['message'] = "Error: " . mysqli_error($conn);
}

mysqli_close($conn);
header('Content-Type: application/json');
echo json_encode($response);