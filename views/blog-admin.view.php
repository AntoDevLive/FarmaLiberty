<?php require '../templates/header-panel.php' ?>

<div class="modal-container invisible">
    <div class="modal">
        <form id="form-blog" method="post" enctype="multipart/form-data">
            <div class="btn-cerrar">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-x">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M18 6l-12 12" />
                    <path d="M6 6l12 12" />
                </svg>
            </div>

            <h2 id="titulo-form-blog"></h2>

            <input name="id" id="id" type="hidden">
            <div class="input-container-modal">
                <label for="titulo">Título</label>
                <input name="titulo" id="titulo" type="text">
            </div>
            <div class="input-container-modal">
                <label for="intro">Introducción</label>
                <input name="intro" id="intro" type="text">
            </div>
            <div class="input-container-modal">
                <label for="contenido">Contenido</label>
                <textarea name="contenido" id="contenido"></textarea>
            </div>
            <div class="input-container-modal">
                <label for="contenido">Imagen</label>
                <input name="img" type="file" accept="image/*">
            </div>
            <div class="input-container-modal">
                <input id="submit-form-blog" type="submit">
            </div>
        </form>
    </div>
</div>

<div class="panel">
    <?php require '../templates/nav-panel.php' ?>

    <div class="panel-body">
        <div class="titulo-panel">
            <h2>Administrar Blog</h2>
            <button class="crear-post">Nuevo post</button>
        </div>

    <?php if($entradas): ?>

        <table>
            <thead>
                <th>ID</th>
                <th>Imagen</th>
                <th>Título</th>
                <th>Acciones</th>
            </thead>

            <?php foreach ($entradas as $entrada): ?>
                <tr>
                    <td><?php echo $entrada['id'] ?></td>
                    <td><img src="<?php echo $entrada['img'] ?>" alt=""></td>
                    <td><?php echo $entrada['titulo'] ?></td>
                    <td class="td-acciones">
                        <div class="botones-blog-admin">
                            <button data-id="<?php echo $entrada['id']; ?>" aria-label="Editar post" title="Editar post" class="btn-secondary"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-edit">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                                    <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
                                    <path d="M16 5l3 3" />
                                </svg>
                            </button>
                            <button data-id="<?php echo $entrada['id']; ?>" aria-label="Eliminar post" title="Eliminar post" class="btn-destructive">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-trash">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M4 7l16 0" />
                                    <path d="M10 11l0 6" />
                                    <path d="M14 11l0 6" />
                                    <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                    <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                </svg>
                            </button>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>

        <?php else: ?>
            <h2 class="vacio">No hay posts en el Blog</h2>
        <?php endif; ?>

        <section id="pagincacion-blog-admin" class="paginacion">
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

    </div>

</div>

<script type="module" src="../js/panel-blog.js"></script>
</body>

</html>