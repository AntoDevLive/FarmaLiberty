<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id = $_POST['id'];

    try {
        $conexion = new PDO('mysql:hostname=localhost;dbname=farmaliberty', 'root', '');

        $query =  $conexion->prepare("DELETE FROM testimoniales WHERE id = :id");
        $query->execute([
            ':id' => $id
        ]);

        echo 'Testimonial eliminado';
    } catch (PDOException $e) {
        echo $e->getMessage();
        exit;
    }
}
