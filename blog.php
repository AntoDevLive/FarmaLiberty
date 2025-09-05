<?php include 'funciones.php';

$conexion = conexionDB('localhost', 'root', '');

$statement = $conexion -> prepare('SELECT * FROM blog');
$statement -> execute();

$entradas = $statement -> fetchAll();




require 'views/blog.view.php';