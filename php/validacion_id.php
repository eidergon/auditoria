<?php
require_once 'conexion.php';

$sql = "SELECT * FROM motivos_validacion_id";
$result = $conn->query($sql);
?>

<?php if ($result->num_rows > 0) : ?>
    <p>Motivo Validación ID&nbsp;&nbsp;</p>
    <?php while ($row = $result->fetch_assoc()) : ?>
        <div class="checkbox-wrapper-65">
            <label>
                <input type="checkbox" value="<?= $row['motivo']; ?>">
                <span class="cbx">
                    <svg viewBox="0 0 12 11" height="11px" width="12px">
                        <polyline points="1 6.29411765 4.5 10 11 1"></polyline>
                    </svg>
                </span>
                <span><?= $row['motivo']; ?></span>
            </label>
        </div>
    <?php endwhile; ?>
<?php else : ?>
<?php endif; ?>