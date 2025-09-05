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

<section class="paginacion">
    <?php if ($pagina == 1): ?>
        <a class="disabled">&laquo;</a>
    <?php else: ?>
        <a href="?pagina=<?php echo $pagina - 1 ?>">&laquo;</a>
    <?php endif; ?>

    <?php
    for ($i = 1; $i <= $totalPaginas; $i++) {
        if ($pagina == $i) {
            echo "<a class='active' href='?pagina=$i'>$i</a>";
        } else {
            echo "<a href='?pagina=$i'>$i</a>";
        }
    }
    ?>

    <?php if ($pagina == $totalPaginas): ?>
        <a class="disabled">&raquo;</a>
    <?php else: ?>
        <a href="?pagina=<?php echo $pagina + 1 ?>">&raquo;</a>
    <?php endif; ?>
</section>


<?php include 'templates/footer.php' ?>
</body>