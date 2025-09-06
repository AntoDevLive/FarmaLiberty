<?php include '../funciones.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    $id = $_POST['id'];
    $titulo = $_POST['titulo'];
    $intro = $_POST['intro'];
    $contenido = $_POST['contenido'];

    $conexion = conexionDB('localhost', 'root', '');

    $statement = $conexion->prepare('UPDATE blog SET titulo = :titulo, intro = :intro, contenido = :contenido WHERE id = :id');


    $statement->execute([
        ':id' => $id,
        ':titulo' => $titulo,
        ':intro' => $intro,
        ':contenido' => $contenido
    ]);

    header('Location: blog-admin.php');
}
