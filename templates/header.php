<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="build/css/app.css">
    <link rel="shortcut icon" href="src/img/favicon.png" type="image/x-icon">
    <title>FarmaLiberty</title>
</head>

<body>

    <div class="modal-container invisible">
        <div class="modal">
            <div class="video-container">
                <iframe id="video-iframe" width="560" height="315" title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>

                <svg id="btn-cerrar" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="icon icon-tabler icons-tabler-outline icon-tabler-x">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M18 6l-12 12" />
                    <path d="M6 6l12 12" />
                </svg>
            </div>
        </div>
    </div>

    <header id="inicio" class="<?php if ($inicio) echo 'header-inicio'; ?>">

        <div class="barra-bg <?php if ($inicio == false) echo "header-fijo"; ?>">

            <div class="barra">
                <div class="logo-container">
                    <a href="http://localhost/FarmaLiberty/"><img src="src/img/logo.png" alt="Logo farma liberty"></a>
                </div>

                <nav>
                    <ul class="enlaces">
                        <li><a class="menu__link" href="index.php#conocenos">Conócenos</a></li>
                        <li><a class="menu__link" href="index.php#donde-estamos">Dónde estamos</a></li>
                        <li><a class="menu__link" href="index.php#testimoniales">Testimoniales</a></li>
                        <li><a class="menu__link" href="index.php#eventos">Eventos</a></li>
                        <li><a class="menu__link" href="index.php#contacto">Contacto</a></li>
                        <li><a class="menu__link" href="blog.php">Blog</a></li>
                    </ul>
                </nav>
            </div>
        </div>

        <?php if ($inicio): ?>
            <div class="info-header">
                <i>
                    <h1>Grupo Sell Out</h1>
                </i>
                <h2>Creado por y para las Farmacias</h2>
                <p>Más de 50 farmacias mejoran la gestión y competitividad de su farmacia.</p>
                <a class="boton-principal" href="#contacto">Únete a FarmaLiberty</a>
            </div>
        <?php endif; ?>
    </header>