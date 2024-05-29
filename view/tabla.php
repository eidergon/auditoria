<?php
require_once '../php/conexion.php';
$sql = "SELECT * FROM datos_auditoria ORDER BY id DESC LIMIT 50";
$result = $conn->query($sql);
?>

<div class="container-table">
    <div class="container-filtro">
        <input type="date" id="fecha_filtro" class="input">
        <input type="date" id="fecha_filtro2" class="input">
        <button id="filtro" class="Btn"><ion-icon name="search-outline"></ion-icon></button>
    </div>

    <?php if ($result->num_rows > 0) : ?>
        <table class="table" id="table">
            <thead>
                <tr>
                    <th>Fecha Auditoria</th>
                    <th>Fecha Llamada</th>
                    <th>Tipo Auditoria</th>
                    <th>Min Auditar</th>
                    <th>Documento Asesor</th>
                    <th>Nombre Asesor</th>
                    <th>Supervisor</th>
                    <th>Sede</th>
                    <th>Campaña</th>
                    <th>Cumple_Habeas_Data</th>
                    <th>Cumple_ley2300</th>
                    <th>Cumple_Malas_Practicas</th>
                    <th>Motivo_Mala_Practica</th>
                    <th>Cumple_Validacion_Id</th>
                    <th>Motivo_Validacion_Id</th>
                    <th>Gestion_Comercial</th>
                    <th>Audio</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) : ?>
                    <tr scope='row'>
                        <td><?= $row["fecha_auditoria"]; ?></td>
                        <td><?= $row["fecha_llamada"]; ?></td>
                        <td><?= $row["tipo_auditoria"]; ?></td>
                        <td><?= $row["min_auditar"]; ?></td>
                        <td><?= $row["documento_asesor"]; ?></td>
                        <td><?= $row["nombre_asesor"]; ?></td>
                        <td><?= $row["supervisor"]; ?></td>
                        <td><?= $row["sede"]; ?></td>
                        <td><?= $row["campaña"]; ?></td>
                        <td><?= $row["cumple_habeas_data"]; ?></td>
                        <td><?= $row["ley2300"]; ?></td>
                        <td><?= $row["cumple_malas_practicas"]; ?></td>
                        <td><?= $row["motivo_mala_practica"]; ?></td>
                        <td><?= $row["cumple_validacion_id"]; ?></td>
                        <td><?= $row["motivo_validacion_id"]; ?></td>
                        <td><?= $row["gestion_comercial"]; ?></td>
                        <td><audio controls><source type="<?= $row['tipo_archivo']; ?>" src='data:<?= $row['tipo_archivo']; ?>;base64,<?= base64_encode($row['datos_archivo']); ?>'></audio></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else : ?>
        <table class="table" id="table">
            <thead>
                <tr>
                <th>Fecha Auditoria</th>
                    <th>Fecha Llamada</th>
                    <th>Tipo Auditoria</th>
                    <th>Min Auditar</th>
                    <th>Documento Asesor</th>
                    <th>Nombre Asesor</th>
                    <th>Supervisor</th>
                    <th>Sede</th>
                    <th>Campaña</th>
                    <th>Cumple_Habeas_Data</th>
                    <th>Cumple_ley2300</th>
                    <th>Cumple_Malas_Practicas</th>
                    <th>Motivo_Mala_Practica</th>
                    <th>Cumple_Validacion_Id</th>
                    <th>Motivo_Validacion_Id</th>
                    <th>Gestion_Comercial</th>
                </tr>
            </thead>
            <tbody>
                <tr scope='row'>
                    <td colspan='16' class='no-data'>Sin Datos</td>
                </tr>
            </tbody>
        </table>
    <?php endif; ?>
</div>