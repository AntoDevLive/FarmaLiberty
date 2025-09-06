<?php require '../funciones.php';

$conexion = conexionDB('localhost', 'root', '');

$pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;

$postPorPagina = 10;

if ($pagina > 1) {
    $inicio = $pagina * $postPorPagina - $postPorPagina;
} else {
    $inicio = 0;
}


$entradas = $conexion->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM blog LIMIT $inicio, $postPorPagina");
$entradas->execute();
$entradas = $entradas->fetchAll();

$totalEntradas = $conexion->query("SELECT FOUND_ROWS() AS 'total'");
$totalEntradas = $totalEntradas->fetch()['total'];

$totalPaginas = ceil($totalEntradas / $postPorPagina);

if ($pagina > 1 && !$entradas) {
    header('Location: blog-admin.php');
}




require '../views/blog-admin.view.php';