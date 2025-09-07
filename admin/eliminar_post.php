<?php include '../funciones.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    $id = $_GET['id'];

    try {
        $conexion = conexionDB('localhost', 'root', '');

        $statement = $conexion->prepare('DELETE FROM blog WHERE id = :id');

        $statement->execute([
            ':id' => $id
        ]);

        echo 'Post eliminado';
    } catch (PDOException $e) {
        echo $e->getMessage();
        exit;
    }
}
