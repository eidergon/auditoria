<?php
include_once 'conexion.php';

$response = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fecha_llamada = $_POST['fecha_llamada'];
    $tipo_auditoria = $_POST['tipo_auditoria'];
    $min_auditar = $_POST['min_auditar'];
    $documento = $_POST['documento'];
    $nombre = $_POST['nombre'];
    $supervisor = $_POST['supervisor'];
    $sede = $_POST['sede'];
    $campaña = $_POST['campaña'];
    $hebeas_data = $_POST['hebeas_data'];
    $ley2300 = $_POST['ley2300'];
    $malas_preacticas = $_POST['malas_preacticas'];
    $motivo_mala_prectica = !empty($_POST['motivo_mala_prectica']) ? $_POST['motivo_mala_prectica'] : null;
    $validacion_id = $_POST['validacion_id'];
    $motivo_validacion_id = !empty($_POST['motivo_validacion_id']) ? $_POST['motivo_validacion_id'] : null;
    $gestion_comercial = $_POST['gestion_comercial'];
    $nombreArchivo = isset($_FILES['archivos']['name']) && !empty($_FILES['archivos']['name']) ? $_FILES['archivos']['name'] : null;
    $tipoArchivo = isset($_FILES['archivos']['type']) && !empty($_FILES['archivos']['type']) ? $_FILES['archivos']['type'] : null;
    $datosArchivo = isset($_FILES['archivos']['tmp_name']) && !empty($_FILES['archivos']['tmp_name']) ? file_get_contents($_FILES['archivos']['tmp_name']) : null;
    $responsable =  $_POST['responsable'];

    $stmt = $conn->prepare("INSERT INTO datos_auditoria (fecha_llamada, tipo_auditoria, min_auditar, documento_asesor, nombre_asesor, supervisor, sede, campaña, cumple_habeas_data, ley2300, cumple_malas_practicas, motivo_mala_practica, cumple_validacion_id, motivo_validacion_id, gestion_comercial, nombre_archivo, tipo_archivo, datos_archivo, responsable) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssssssssssssss", $fecha_llamada, $tipo_auditoria, $min_auditar, $documento, $nombre, $supervisor, $sede, $campaña, $hebeas_data, $ley2300, $malas_preacticas, $motivo_mala_prectica, $validacion_id, $motivo_validacion_id, $gestion_comercial, $nombreArchivo, $tipoArchivo, $datosArchivo, $responsable);
    
    if ($stmt->execute()) {
        $response['status'] = 'success';
        $response['message'] = 'Entrevista agendada correctamente.';
    } else {
        $response['status'] = 'error';
        $response['message'] = 'Error al agendar la entrevista: ' . $conn->error;
    }
    
    $stmt->close();
} else {
    $response['status'] = 'error';
    $response['message'] = 'Método de solicitud incorrecto.';
}

header('Content-Type: application/json');
echo json_encode($response);
