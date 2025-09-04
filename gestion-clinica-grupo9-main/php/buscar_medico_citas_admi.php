<?php
header('Content-Type: application/json');
require_once 'conexion.php';

$tipo = $_GET['tipo'] ?? '';
$q = $_GET['q'] ?? '';
$id_especialidad = $_GET['especialidad'] ?? $_GET['id_especialidad'] ?? '';



if (!$q || !$tipo) {
    echo json_encode([]);
    exit;
}

$like = "%$q%";

if ($tipo === 'medico') {
    if ($id_especialidad) {
        $sql = "SELECT id_medico AS id, CONCAT(nombres, ' ', apellidos) AS nombre 
                FROM medicos 
                WHERE id_especialidad = ? AND (nombres LIKE ? OR apellidos LIKE ?)
                LIMIT 10";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("iss", $id_especialidad, $like, $like);
    } else {
        $sql = "SELECT id_medico AS id, CONCAT(nombres, ' ', apellidos) AS nombre 
                FROM medicos 
                WHERE nombres LIKE ? OR apellidos LIKE ?
                LIMIT 10";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("ss", $like, $like);
    }
} elseif ($tipo === 'paciente') {
    $sql = "SELECT id_paciente AS id, CONCAT(nombres, ' ', apellidos) AS nombre 
            FROM pacientes 
            WHERE nombres LIKE ? OR apellidos LIKE ?
            LIMIT 10";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("ss", $like, $like);
} else {
    echo json_encode([]);
    exit;
}

$stmt->execute();
$res = $stmt->get_result();

$datos = [];
while ($fila = $res->fetch_assoc()) {
    $datos[] = $fila;
}

echo json_encode($datos);

$stmt->close();
$conexion->close();
