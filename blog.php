<?php include 'funciones.php';

if($_SERVER['REQUEST_METHOD'] == 'GET') {

$conexion = conexionDB('localhost', 'root', '');

$pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;

$postPorPagina = 4;

if ($pagina > 1) {
    $inicio = $pagina * $postPorPagina - $postPorPagina;
} else {
    $inicio = 0;
}

$busqueda = $_GET['buscar'] ?? '';

$entradas = $conexion->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM blog WHERE titulo LIKE :busqueda OR contenido LIKE :busqueda LIMIT $inicio, $postPorPagina");
$entradas->execute([
    ':busqueda' => "%$busqueda%"
]);
$entradas = $entradas->fetchAll();

$totalEntradas = $conexion->query("SELECT FOUND_ROWS() AS 'total'");
$totalEntradas = $totalEntradas->fetch()['total'];

$totalPaginas = ceil($totalEntradas / $postPorPagina);

if ($pagina > 1 && !$entradas) {
    header('Location: blog.php');
}
}

require 'views/blog.view.php';