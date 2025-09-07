<?php
session_start();

if (isset($_SESSION['usuario']) && $_SESSION['usuario'] == 'admin') {
    require '../views/panel.view.php';
} else {
    require '../views/login.view.php';
}
