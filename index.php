<?php

include 'funciones.php';

$conexion = conexionDB('localhost', 'farmaliberty', 'root', '');

$statement = $conexion->prepare("SELECT * FROM testimoniales WHERE estado = 'aprobado'");
$statement->execute();
$resultados = $statement->fetchAll();


require 'views/index.view.php';