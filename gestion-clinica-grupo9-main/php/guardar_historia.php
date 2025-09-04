<?php
include 'conexion.php';
parse_str(file_get_contents('php://input'), $_POST);
$sql="INSERT INTO historias_clinicas (id_paciente,fecha_registro,motivo_consulta,diagnostico,tratamiento,id_medico)
       VALUES (?,?,?,?,'',?)";
$stmt=$conexion->prepare($sql);
$stmt->bind_param('isssi', $_POST['id_paciente'], $_POST['fecha_registro'], $_POST['motivo_consulta'], $_POST['diagnostico'], $_POST['id_medico']);
$stmt->execute();
echo 'OK';