<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id = $_POST['id'];

    try {
        $conexion = new PDO('mysql:hostname=localhost;dbname=farmaliberty', 'root', '');

        $query =  $conexion->prepare("UPDATE testimoniales SET estado = 'aprobado' WHERE id = :id");
        $query->execute([
            ':id' => $id
        ]);

        echo 'Testimonial publicado';
    } catch (PDOException $e) {
        echo $e->getMessage();
        exit;
    }
}
