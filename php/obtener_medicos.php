<?php
require_once "conexion.php";

$sql = "SELECT m.id_medico, m.nombres, m.apellidos, e.nombre AS nombre_especialidad, m.telefono, m.correo
        FROM medicos m
        INNER JOIN especialidades e ON m.id_especialidad = e.id_especialidad";

$resultado = $conexion->query($sql);

$medicos = [];

while ($fila = $resultado->fetch_assoc()) {
    $medicos[] = $fila;
}

header('Content-Type: application/json');
echo json_encode($medicos);

