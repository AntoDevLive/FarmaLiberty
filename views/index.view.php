<?php require 'templates/header.php';

    try {
        $conexion = new PDO('mysql:hostname=localhost;dbname=farmaliberty', 'root', '');
    } catch (PDOException $e) {
        $e -> getMessage();
    }

    $statement = $conexion -> prepare("SELECT * FROM testimoniales WHERE estado = 'aprobado'");
    $statement -> execute();
    $resultados = $statement -> fetchAll();
        
?>

    <section id="conocenos">
        <h2>Nuestros valores</h2>
        <p class="texto-conocenos">En Farmaliberty entendemos los retos diarios de la oficina de farmacia. Por eso,
            acompañamos a cada socio con herramientas, formación y apoyo personalizado para <br>que pueda centrarse en
            lo más importante: el cuidado de sus pacientes. Desde la optimización de procesos hasta la incorporación de
            tecnología, estamos a tu lado para <br>que tu farmacia sea más eficiente, competitiva y sostenible.</p>

        <div class="valores">

            <div class="valor-container">
                <div class="valor">
                    <svg aria-hidden="true" class="e-font-icon-svg e-fas-hand-holding-medical" viewBox="0 0 576 512"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M159.88,175.82h64v64a16,16,0,0,0,16,16h64a16,16,0,0,0,16-16v-64h64a16,16,0,0,0,16-16v-64a16,16,0,0,0-16-16h-64v-64a16,16,0,0,0-16-16h-64a16,16,0,0,0-16,16v64h-64a16,16,0,0,0-16,16v64A16,16,0,0,0,159.88,175.82ZM568.07,336.13a39.91,39.91,0,0,0-55.93-8.47L392.47,415.84H271.86a16,16,0,0,1,0-32H350.1c16,0,30.75-10.87,33.37-26.61a32.06,32.06,0,0,0-31.62-37.38h-160a117.7,117.7,0,0,0-74.12,26.25l-46.5,37.74H15.87a16.11,16.11,0,0,0-16,16v96a16.11,16.11,0,0,0,16,16h347a104.8,104.8,0,0,0,61.7-20.27L559.6,392A40,40,0,0,0,568.07,336.13Z">
                        </path>
                    </svg>
                    <h3>Visión sanitaria</h3>
                    <p>El paciente es el centro de todo lo que hacemos y nuestra principal prioridad.</p>
                </div>
            </div>

            <div class="valor-container">
                <div class="valor">
                    <svg aria-hidden="true" class="e-font-icon-svg e-fas-heart" viewBox="0 0 512 512"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M462.3 62.6C407.5 15.9 326 24.3 275.7 76.2L256 96.5l-19.7-20.3C186.1 24.3 104.5 15.9 49.7 62.6c-62.8 53.6-66.1 149.8-9.9 207.9l193.5 199.8c12.5 12.9 32.8 12.9 45.3 0l193.5-199.8c56.3-58.1 53-154.3-9.8-207.9z">
                        </path>
                    </svg>
                    <h3>Factor humano</h3>
                    <p>Creemos en la cercanía, el respeto y un trato siempre humano y personalizado.</p>
                </div>
            </div>

            <div class="valor-container">
                <div class="valor">
                    <svg aria-hidden="true" class="e-font-icon-svg e-fas-balance-scale" viewBox="0 0 640 512"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M256 336h-.02c0-16.18 1.34-8.73-85.05-181.51-17.65-35.29-68.19-35.36-85.87 0C-2.06 328.75.02 320.33.02 336H0c0 44.18 57.31 80 128 80s128-35.82 128-80zM128 176l72 144H56l72-144zm511.98 160c0-16.18 1.34-8.73-85.05-181.51-17.65-35.29-68.19-35.36-85.87 0-87.12 174.26-85.04 165.84-85.04 181.51H384c0 44.18 57.31 80 128 80s128-35.82 128-80h-.02zM440 320l72-144 72 144H440zm88 128H352V153.25c23.51-10.29 41.16-31.48 46.39-57.25H528c8.84 0 16-7.16 16-16V48c0-8.84-7.16-16-16-16H383.64C369.04 12.68 346.09 0 320 0s-49.04 12.68-63.64 32H112c-8.84 0-16 7.16-16 16v32c0 8.84 7.16 16 16 16h129.61c5.23 25.76 22.87 46.96 46.39 57.25V448H112c-8.84 0-16 7.16-16 16v32c0 8.84 7.16 16 16 16h416c8.84 0 16-7.16 16-16v-32c0-8.84-7.16-16-16-16z">
                        </path>
                    </svg>
                    <h3>Transparencia</h3>
                    <p>Actuamos con honestidad, claridad y coherencia en cada una de nuestras acciones.</p>
                </div>
            </div>

            <div class="valor-container">
                <div class="valor">
                    <svg aria-hidden="true" class="e-font-icon-svg e-fas-award" viewBox="0 0 384 512"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M97.12 362.63c-8.69-8.69-4.16-6.24-25.12-11.85-9.51-2.55-17.87-7.45-25.43-13.32L1.2 448.7c-4.39 10.77 3.81 22.47 15.43 22.03l52.69-2.01L105.56 507c8 8.44 22.04 5.81 26.43-4.96l52.05-127.62c-10.84 6.04-22.87 9.58-35.31 9.58-19.5 0-37.82-7.59-51.61-21.37zM382.8 448.7l-45.37-111.24c-7.56 5.88-15.92 10.77-25.43 13.32-21.07 5.64-16.45 3.18-25.12 11.85-13.79 13.78-32.12 21.37-51.62 21.37-12.44 0-24.47-3.55-35.31-9.58L252 502.04c4.39 10.77 18.44 13.4 26.43 4.96l36.25-38.28 52.69 2.01c11.62.44 19.82-11.27 15.43-22.03zM263 340c15.28-15.55 17.03-14.21 38.79-20.14 13.89-3.79 24.75-14.84 28.47-28.98 7.48-28.4 5.54-24.97 25.95-45.75 10.17-10.35 14.14-25.44 10.42-39.58-7.47-28.38-7.48-24.42 0-52.83 3.72-14.14-.25-29.23-10.42-39.58-20.41-20.78-18.47-17.36-25.95-45.75-3.72-14.14-14.58-25.19-28.47-28.98-27.88-7.61-24.52-5.62-44.95-26.41-10.17-10.35-25-14.4-38.89-10.61-27.87 7.6-23.98 7.61-51.9 0-13.89-3.79-28.72.25-38.89 10.61-20.41 20.78-17.05 18.8-44.94 26.41-13.89 3.79-24.75 14.84-28.47 28.98-7.47 28.39-5.54 24.97-25.95 45.75-10.17 10.35-14.15 25.44-10.42 39.58 7.47 28.36 7.48 24.4 0 52.82-3.72 14.14.25 29.23 10.42 39.59 20.41 20.78 18.47 17.35 25.95 45.75 3.72 14.14 14.58 25.19 28.47 28.98C104.6 325.96 106.27 325 121 340c13.23 13.47 33.84 15.88 49.74 5.82a39.676 39.676 0 0 1 42.53 0c15.89 10.06 36.5 7.65 49.73-5.82zM97.66 175.96c0-53.03 42.24-96.02 94.34-96.02s94.34 42.99 94.34 96.02-42.24 96.02-94.34 96.02-94.34-42.99-94.34-96.02z">
                        </path>
                    </svg>
                    <h3>Equipos de alto rendimiento</h3>
                    <p>Formamos equipos altamente capacitados, comprometidos con la excelencia y la mejora continua.</p>
                </div>
            </div>

            <div class="valor-container">
                <div class="valor">
                    <svg aria-hidden="true" class="e-font-icon-svg e-fas-user-cog" viewBox="0 0 640 512"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M610.5 373.3c2.6-14.1 2.6-28.5 0-42.6l25.8-14.9c3-1.7 4.3-5.2 3.3-8.5-6.7-21.6-18.2-41.2-33.2-57.4-2.3-2.5-6-3.1-9-1.4l-25.8 14.9c-10.9-9.3-23.4-16.5-36.9-21.3v-29.8c0-3.4-2.4-6.4-5.7-7.1-22.3-5-45-4.8-66.2 0-3.3.7-5.7 3.7-5.7 7.1v29.8c-13.5 4.8-26 12-36.9 21.3l-25.8-14.9c-2.9-1.7-6.7-1.1-9 1.4-15 16.2-26.5 35.8-33.2 57.4-1 3.3.4 6.8 3.3 8.5l25.8 14.9c-2.6 14.1-2.6 28.5 0 42.6l-25.8 14.9c-3 1.7-4.3 5.2-3.3 8.5 6.7 21.6 18.2 41.1 33.2 57.4 2.3 2.5 6 3.1 9 1.4l25.8-14.9c10.9 9.3 23.4 16.5 36.9 21.3v29.8c0 3.4 2.4 6.4 5.7 7.1 22.3 5 45 4.8 66.2 0 3.3-.7 5.7-3.7 5.7-7.1v-29.8c13.5-4.8 26-12 36.9-21.3l25.8 14.9c2.9 1.7 6.7 1.1 9-1.4 15-16.2 26.5-35.8 33.2-57.4 1-3.3-.4-6.8-3.3-8.5l-25.8-14.9zM496 400.5c-26.8 0-48.5-21.8-48.5-48.5s21.8-48.5 48.5-48.5 48.5 21.8 48.5 48.5-21.7 48.5-48.5 48.5zM224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm201.2 226.5c-2.3-1.2-4.6-2.6-6.8-3.9l-7.9 4.6c-6 3.4-12.8 5.3-19.6 5.3-10.9 0-21.4-4.6-28.9-12.6-18.3-19.8-32.3-43.9-40.2-69.6-5.5-17.7 1.9-36.4 17.9-45.7l7.9-4.6c-.1-2.6-.1-5.2 0-7.8l-7.9-4.6c-16-9.2-23.4-28-17.9-45.7.9-2.9 2.2-5.8 3.2-8.7-3.8-.3-7.5-1.2-11.4-1.2h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c10.1 0 19.5-3.2 27.2-8.5-1.2-3.8-2-7.7-2-11.8v-9.2z">
                        </path>
                    </svg>
                    <h3>Sinergias</h3>
                    <p>Ofrecemos el mejor producto gracias a la colaboración entre Farmaliberty, la industria y las
                        cooperativas.</p>
                </div>
            </div>

            <div class="valor-container">
                <div class="valor">
                    <svg aria-hidden="true" class="e-font-icon-svg e-fas-layer-group" viewBox="0 0 512 512"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M12.41 148.02l232.94 105.67c6.8 3.09 14.49 3.09 21.29 0l232.94-105.67c16.55-7.51 16.55-32.52 0-40.03L266.65 2.31a25.607 25.607 0 0 0-21.29 0L12.41 107.98c-16.55 7.51-16.55 32.53 0 40.04zm487.18 88.28l-58.09-26.33-161.64 73.27c-7.56 3.43-15.59 5.17-23.86 5.17s-16.29-1.74-23.86-5.17L70.51 209.97l-58.1 26.33c-16.55 7.5-16.55 32.5 0 40l232.94 105.59c6.8 3.08 14.49 3.08 21.29 0L499.59 276.3c16.55-7.5 16.55-32.5 0-40zm0 127.8l-57.87-26.23-161.86 73.37c-7.56 3.43-15.59 5.17-23.86 5.17s-16.29-1.74-23.86-5.17L70.29 337.87 12.41 364.1c-16.55 7.5-16.55 32.5 0 40l232.94 105.59c6.8 3.08 14.49 3.08 21.29 0L499.59 404.1c16.55-7.5 16.55-32.5 0-40z">
                        </path>
                    </svg>
                    <h3>Verticalidad</h3>
                    <p>Nuestras decisiones siguen una estructura clara basada en órganos técnicos y directivos.</p>
                </div>
            </div>

        </div>

        <a class="boton-principal" href="#contacto">Quiero formar parte del grupo</a>
    </section>

    <section id="equipo">
        <div class="equipo-container">

            <div class="img-container">
                <img src="src/img/picture.png" alt="">
            </div>

            <div class="texto-equipo">
                <h3>Impulsa tu farmacia con <br>nuestro apoyo constante</h3>
                <p>Formación continua, acompañamiento personalizado y un enfoque sanitario real. En Farmaliberty te
                    ayudamos a mejorar la gestión y competitividad de tu farmacia sin que pierdas de vista lo más
                    importante, tus pacientes.</p>
                <a href="#contacto">Impulsa tu negocio</a>
            </div>
        </div>

        <div class="equipo-container">

            <div class="texto-equipo">
                <h3>Forma parte de una <br>familia que crece contigo</h3>
                <p>Farmaliberty está formado por farmacias que comparten una misma actitud: ganas de mejorar, adaptarse
                    y avanzar. Cada miembro aporta su experiencia, se apoya en el grupo y adopta, herramientas que
                    marcan la diferencia.</p>
                <a href="#contacto">Mejora tu farmacia</a>
            </div>

            <div class="img-container">
                <img src="src/img/picture-2.png" alt="">
            </div>
        </div>
    </section>

    <section id="donde-estamos">
        <div class="texto">
            <h3>Estamos cerca de ti</h3>
            <p>Farmaliberty está presente, principalmente en Andalucía Occidental, representado por las farmacias más
                referentes <br>de la zona.</p>
        </div>

        <div class="img-container">
            <img src="src/img/mapa.webp" alt="">
        </div>
    </section>

    <section id="testimoniales">
        <h2>Lo dicen quienes ya forman parte</h2>
        <p class="subtitulo">Farmacias que han confiado en Farmaliberty comparten su experiencia y los beneficios reales de pertenecer a nuestro grupo.</p>

        <div class="testimoniales-container">

        <?php foreach ($resultados as $resultado): ?>
            <div class="testimonial">
                <p><?php echo $resultado['testimonial'] ?></p>
                <p><?php echo $resultado['company'] ?></p>
                <p><?php echo $resultado['ciudad'] ?></p>
            </div>
        <?php endforeach; ?>

        </div>

        <form class="form-general" method="post" action="/FarmaLiberty/admin/testimoniales.php" id="form-testimoniales">
            <h3>Cuéntanos tu experiencia</h3>
            <div class="input-container">
                <input name="company" type="text" id="company-input" placeholder="">
                <label for="company-input">Compañía</label>
            </div>
            <div class="input-container">
                <input name="ciudad" type="text" id="ciudad-input" placeholder="">
                <label for="ciudad-input">Ciudad</label>
            </div>
            <div class="input-container">
                <textarea name="testimonial" id="testimonial-mensaje" placeholder=""></textarea>
                <label for="testimonial-mensaje">Testimonial</label>
            </div>
            <div class="input-container">
                <button id="submit-testimonial">Enviar</button>
            </div>
        </form>

    </section>

    <section id="eventos">
        <h2>Últimos eventos</h2>
        <p>Farmacias que han confiado en FarmaLiberty comparten su experiencia y los beneficios reales de pertenecer a
            nuestro grupo.</p>

        <div class="play-video">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor"
                class="btn-video icon icon-tabler icons-tabler-filled icon-tabler-player-play">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M6 4v16a1 1 0 0 0 1.524 .852l13 -8a1 1 0 0 0 0 -1.704l-13 -8a1 1 0 0 0 -1.524 .852z" />
            </svg>
            <p class="btn-video">Ver vídeo</p>
        </div>

        <img src="src/img/portada-video.png" alt="">
    </section>

    <section id="contacto">
        <h2>Hablamos sobre tu Farmacia</h2>

        <p>Si estás buscando un grupo que te acompañe, te escuche y te ayude a crecer, estamos aquí para ti. Cuéntanos
            un poco sobre tu farmacia y descubre cómo podemos ayudarte a dar el siguiente paso con Farmaliberty.</p>

        <form class="form-general" action="" id="form-contacto">
            <h3>Contacto</h3>
            <div class="input-container">
                <input type="text" id="name-input" placeholder="">
                <label for="name-input">Tu nombre</label>
            </div>
            <div class="input-container">
                <input type="text" id="email-input" placeholder="">
                <label for="email-input">Tu correo electrónico</label>
            </div>
            <div class="input-container">
                <input type="text" id="asunto-input" placeholder="">
                <label for="asunto-input">Asunto</label>
            </div>
            <div class="input-container">
                <textarea name="" id="contacto-mensaje" placeholder=""></textarea>
                <label for="contacto-mensaje">Mensaje</label>
            </div>
            <div class="input-container">
                <button id="submit-contacto">Enviar</button>
            </div>
        </form>
    </section>

<?php include 'templates/footer.php' ?>

    <script src="js/main.js"></script>
</body>

</html>