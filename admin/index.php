<?php
session_start();

if (isset($_SESSION['usuario'])) {
    require '../views/panel.view.php';
} else {
    require '../views/login.view.php';
}
