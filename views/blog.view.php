<?php $inicio = false;
include 'templates/header.php';  ?>


<section class="entradas">

    <?php
    foreach ($entradas as $entrada) {
        echo '<div class="entrada">';
        echo '<h2>' . $entrada['titulo'] . '</h2>';
        echo '<div class="entrada-img">';
        echo '<a href="#"><img src="' . $entrada['img'] . '"></a>';
        echo '</div>';
        echo '<p>' . $entrada['contenido'] . '</p>';
        echo '<a href="#">Leer más</a>';
        echo '</div>';
    }
    ?>

</section>




<?php include 'templates/footer.php' ?>
</body>