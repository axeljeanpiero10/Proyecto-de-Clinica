<?php
header('Content-Type: application/json');
require_once 'conexion.php';

$q = $_GET['q'] ?? '';

if (!$q) {
    echo json_encode([]);
    exit;
}

$like = "%$q%";
$sql = "SELECT id_paciente, nombres, apellidos 
        FROM pacientes 
        WHERE nombres LIKE ? OR apellidos LIKE ?
        LIMIT 10";

$stmt = $conexion->prepare($sql);
$stmt->bind_param("ss", $like, $like);
$stmt->execute();
$res = $stmt->get_result();

$pacientes = [];
while ($row = $res->fetch_assoc()) {
    $pacientes[] = $row;
}

echo json_encode($pacientes);

$stmt->close();
$conexion->close();
