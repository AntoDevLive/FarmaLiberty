<?php

try {
    $conexion = new PDO('mysql:hostname=localhost;dbname=farmaliberty', 'root', '');
} catch (PDOException $e) {
    $e -> getMessage();
}


if($_SERVER['REQUEST_METHOD'] == 'POST') {

    $company = $_POST['company'];
    $ciudad = $_POST['ciudad'];
    $testimonial = $_POST['testimonial'];

    $inyeccion = $conexion -> prepare('INSERT INTO testimoniales (id, company, ciudad, testimonial) VALUES (null, :company, :ciudad, :testimonial)');
    $inyeccion -> execute(array(
        ':company' => $company,
        ':ciudad' => $ciudad,
        ':testimonial' => $testimonial
    ));

    header('Location: /FarmaLiberty/index.php#testimoniales');
}

$filtro = isset($_GET['filtro']) ? $_GET['filtro'] : 'pendiente';


$pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;



$postPorPagina = 4;

if($pagina > 1) {
    $inicio = $pagina * $postPorPagina - $postPorPagina;
} else {
    $inicio = 0;
}

$testimoniales = $conexion -> prepare("SELECT SQL_CALC_FOUND_ROWS * FROM testimoniales WHERE estado = :filtro LIMIT $inicio, $postPorPagina");
$testimoniales -> execute(array(
    ':filtro' => $filtro
));
$testimoniales = $testimoniales -> fetchAll();


$totalTestimoniales = $conexion -> query("SELECT FOUND_ROWS() AS 'total'");
$totalTestimoniales = $totalTestimoniales -> fetch()['total'];

$totalPaginas = ceil($totalTestimoniales / $postPorPagina);


if($pagina > 1 && !$testimoniales) {
    header('Location: testimoniales.php');
}

require '../views/testimoniales.view.php';