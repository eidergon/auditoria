<?php
include_once 'conexion.php';
$tipo_motivo = $_GET['tipo_motivo'];

$sql = "SELECT * FROM $tipo_motivo";
$result = $conn->query($sql);
?>

<?php if ($result->num_rows > 0) : ?>
    <table class="table" id="table">
        <thead>
            <tr>
                <th>Motivo</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()) : ?>
                <tr scope='row'>
                    <td><?= $row["motivo"]; ?></td>
                    <td><button data-id="<?= $row["id"]; ?>" class="boton eliminar"><ion-icon name="trash-outline"></ion-icon></button></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
<?php else : ?>
<?php endif; ?>