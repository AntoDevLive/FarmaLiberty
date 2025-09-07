<?php $inicio = false;
include 'templates/header.php';  ?>

<section class="entradas">
    <h1>BLOG</h1>

    <form name="buscar" method="get" action="blog.php" class="busqueda">
        <input name="buscar" type="text" placeholder="Buscar post">
        <button type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-search">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                <path d="M21 21l-6 -6" />
            </svg>
        </button>
    </form>

    <?php
    if (!$entradas) {
        echo "<h2 class='vacio'>No hay resultados de la búsqueda: $busqueda</h2>";
    }
    ?>

    <div class="entradas-container">
        <?php
        foreach ($entradas as $entrada) {
            echo '<div class="entrada">';
            echo '<h2>' . $entrada['titulo'] . '</h2>';
            echo '<div class="entrada-img">';
            echo '<a href="entrada.php?id=' . $entrada['id'] . '"><img src="admin/' . $entrada['img'] . '"></a>';
            echo '</div>';
            echo '<p>' . $entrada['intro'] . '</p>';
            echo '<a href="entrada.php?id=' . $entrada['id'] . '">Leer más</a>';
            echo '</div>';
        }
        ?>
    </div>
</section>

<section class="paginacion">
    <?php if ($pagina == 1): ?>
        <a class="disabled">&laquo;</a>
    <?php else: ?>
        <a href="?pagina=<?php echo $pagina - 1 ?>&buscar=<?php echo $busqueda ?>">&laquo;</a>
    <?php endif; ?>

    <?php
    for ($i = 1; $i <= $totalPaginas; $i++) {
        if ($pagina == $i) {
            echo "<a class='active' href='?pagina=$i&buscar=$busqueda'>$i</a>";
        } else {
            echo "<a href='?pagina=$i&buscar=$busqueda'>$i</a>";
        }
    }
    ?>

    <?php if ($pagina == $totalPaginas): ?>
        <a class="disabled">&raquo;</a>
    <?php else: ?>
        <a href="?pagina=<?php echo $pagina + 1 ?>&buscar=<?php echo $busqueda ?>">&raquo;</a>
    <?php endif; ?>
</section>


<?php include 'templates/footer.php' ?>

<script>
    document.addEventListener('keydown', e => {
        if (e.ctrlKey && e.altKey && e.key === 'a') {
            window.location.href = "/FarmaLiberty/admin/";
        }
    });
</script>
</body>