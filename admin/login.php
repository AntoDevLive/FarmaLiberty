<?php session_start();

include '../funciones.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {

    $user = $_POST['user'];
    $pass = $_POST['pass'];

    $conexion = conexionDB('localhost', 'root', '');
    $consulta = $conexion->prepare('SELECT * FROM admins WHERE user = :user AND pass = :pass');
    $consulta -> execute([
        ':user' => $user,
        ':pass' => $pass
    ]);
    $resultado_consulta = $consulta -> fetch();

    if($resultado_consulta) {
        $_SESSION['usuario'] = $user;
        header('Location: index.php');
    } else {
        header('Location: login.php');
    }

}


require '../views/login.view.php';