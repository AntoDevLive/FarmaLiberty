<?php require 'funciones.php';

$id = $_GET['id'];

$conexion = conexionDB('localhost', 'root', '');

$statement = $conexion->prepare('SELECT * FROM blog WHERE id = :id');
$statement->execute([
    ':id' => $id
]);
$resultado_entrada = $statement->fetch();

echo json_encode($resultado_entrada, JSON_PRETTY_PRINT); 