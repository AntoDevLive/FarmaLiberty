<?php include '../funciones.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {


    $id = $_GET['id'];

    $conexion = conexionDB('localhost', 'root', '');

    $statement = $conexion->prepare('DELETE FROM blog WHERE id = :id');


    $statement->execute([
        ':id' => $id
    ]);

    header('Location: blog-admin.php');
}
