<?php include 'templates/header.php';


if (!$resultado_entrada || !ctype_digit($id)) {
    echo "<div class='entrada-dinamica'>
            <h1 class='vacio'>La entrada '$id' no existe</h1>
            <a href='blog.php' class='enlace-entrada-vacia'>
                <svg  xmlns='http://www.w3.org/2000/svg'  width='35'  height='35'  viewBox='0 0 24 24'  fill='none'  stroke='#ffffff'  stroke-width='2'  stroke-linecap='round'  stroke-linejoin='round'  class='icon icon-tabler icons-tabler-outline icon-tabler-arrow-left'><path stroke='none' d='M0 0h24v24H0z' fill='none'/><path d='M5 12l14 0' /><path d='M5 12l6 6' /><path d='M5 12l6 -6' /></svg>
                Volver al blog
            </a>
        </div>";
} else {
    echo "<div class='entrada-dinamica'>
            <h1>" . htmlspecialchars($resultado_entrada['titulo']) . "</h1>
            <img src='" . htmlspecialchars($resultado_entrada['img']) . "' alt='Imagen de la entrada'>
            <strong>" . nl2br(htmlspecialchars($resultado_entrada['intro'])) . "</strong>
            <p>" . nl2br(htmlspecialchars($resultado_entrada['contenido'])) . "</p>
            <a id='volver-blog' href='blog.php' class='enlace-entrada-vacia'>
                <svg  xmlns='http://www.w3.org/2000/svg'  width='30'  height='30'  viewBox='0 0 24 24'  fill='none'  stroke='#ffffff'  stroke-width='2'  stroke-linecap='round'  stroke-linejoin='round'  class='icon icon-tabler icons-tabler-outline icon-tabler-arrow-left'><path stroke='none' d='M0 0h24v24H0z' fill='none'/><path d='M5 12l14 0' /><path d='M5 12l6 6' /><path d='M5 12l6 -6' /></svg>
                Volver
            </a>
          </div>";
}

include 'templates/footer.php';
?>

<script>
    document.addEventListener('keydown', e => {
        if (e.ctrlKey && e.altKey && e.key === 'a') {
            window.location.href = "/FarmaLiberty/admin/";
        }
    });
</script>