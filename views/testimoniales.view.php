<?php require '../templates/header-panel.php' ?>

<div class="modal-container invisible">
    <div class="modal">

    </div>
</div>

<div class="panel">
    <?php require '../templates/nav-panel.php' ?>

    <div class="panel-body">
        <h2>Administracion de testimoniales</h2>
        <form id="form-filtro" action="testimoniales.php" method="get">
            <select name="filtro" id="select-testimoniales">
                <?php if($filtro == 'pendiente'): ?>
                    <option value="pendiente" selected>Testimoniales pendientes</option>
                    <option value="aprobado">Testimoniales aprobados</option>
                <?php else: ?>
                    <option value="pendiente">Testimoniales pendientes</option>
                    <option value="aprobado" selected>Testimoniales aprobados</option>
                <?php endif; ?>
            </select>
            <input type="submit" value="Filtrar">
        </form>
        <div class="testimoniales-container">

            <?php if ($testimoniales): ?>
                <?php foreach ($testimoniales as $testimonial): ?>
                    <div class="testimonial-panel-container">
                        <div class="testimonial-panel">
                            <p> <?php echo $testimonial['testimonial'] ?> </p>
                            <p> <?php echo $testimonial['company'] ?> </p>
                            <p> <?php echo $testimonial['ciudad'] ?> </p>
                        </div>

                        <div class="botones">
                            <?php if($filtro == 'aprobado'): ?>                                
                                <button class="btn-ocultar" data-id="<?php echo $testimonial['id'] ?>">Ocultar</button>
                            <?php else: ?>
                                <button class="btn-aprobar" data-id="<?php echo $testimonial['id'] ?>">Publicar</button>  
                            <?php endif; ?>                              
                            <button class="btn-descartar" data-id="<?php echo $testimonial['id'] ?>">Descartar</button>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="mensaje-testimonial">
                    <h2>No hay testimoniales</h2>
                </div>
            <?php endif; ?>
        </div>


        <section class="paginacion">
            <?php if ($pagina == 1): ?>
                <a class="disabled">&laquo;</a>
            <?php else: ?>
                <a href="?pagina=<?php echo $pagina - 1 ?>&filtro=<?php echo $filtro ?>">&laquo;</a>
            <?php endif; ?>

            <?php
            for ($i = 1; $i <= $totalPaginas; $i++) {
                if ($pagina == $i) {
                    echo "<a class='active' href='?pagina=$i&filtro=$filtro'>$i</a>";
                } else {
                    echo "<a href='?pagina=$i&filtro=$filtro'>$i</a>";
                }
            }
            ?>

            <?php if ($pagina == $totalPaginas): ?>
                <a class="disabled">&raquo;</a>
            <?php else: ?>
                <a href="?pagina=<?php echo $pagina + 1 ?>&filtro=<?php echo $filtro ?>">&raquo;</a>
            <?php endif; ?>
        </section>


    </div>
</div>

<script src="../js/panel.js"></script>
</body>

</html>