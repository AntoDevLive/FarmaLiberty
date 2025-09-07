<?php include '../funciones.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $titulo = $_POST['titulo'];
    $intro = $_POST['intro'];
    $contenido = $_POST['contenido'];
    $img = $_FILES['img']['name'];

    $carpeta_destino = 'img_blog/';
    $ruta_final = $carpeta_destino . $_FILES['img']['name'];

    $check = @getimagesize($_FILES['img']['tmp_name']);

    if($check) {
      move_uploaded_file($_FILES['img']['tmp_name'], $ruta_final);
        $conexion = conexionDB('localhost', 'root', '');

        $statement = $conexion->prepare('INSERT INTO blog (titulo, intro, contenido, img) VALUES (:titulo, :intro, :contenido, :img)');

        $statement->execute([
            ':titulo' => $titulo,
            ':intro' => $intro,
            ':contenido' => $contenido,
            ':img' => $ruta_final
        ]);

        header('Location: blog-admin.php');
    } else {
        header('Location: blog-admin.php');
    }
}
