<?php
// $servername = "10.206.173.188:3306";
// $username = "mysqldb";
// $password = "0n3C0nt4ct1nt3rn4c10n4l.06++";
// $dbname = "auditoria";

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "auditoria";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}