<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id = $_POST['id'];

    try {
        $conexion = new PDO('mysql:hostname=localhost;dbname=farmaliberty', 'root', '');

        $query =  $conexion->prepare("UPDATE testimoniales SET estado = 'pendiente' WHERE id = :id");
        $query->execute([
            ':id' => $id
        ]);

        echo 'Testimonial ocultado';
    } catch (PDOException $e) {
        echo $e->getMessage();
        exit;
    }
}
