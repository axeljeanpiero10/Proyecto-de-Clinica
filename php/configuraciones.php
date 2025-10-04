<?php
$conexion = new mysqli("localhost", "root", "", "gestion_clinica");
$conexion->set_charset("utf8");

if ($conexion->connect_error) {
  die("Error de conexión: " . $conexion->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["listar"])) {
  $res = $conexion->query("SELECT * FROM configuraciones");
  $datos = [];
  while ($fila = $res->fetch_assoc()) {
    $datos[] = $fila;
  }
  echo json_encode($datos);
  exit;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  foreach ($_POST as $clave => $valor) {
    $stmt = $conexion->prepare("UPDATE configuraciones SET valor = ? WHERE clave = ?");
    $stmt->bind_param("ss", $valor, $clave);
    $stmt->execute();
    $stmt->close();
  }
  echo "ok";
  exit;
}
?>
