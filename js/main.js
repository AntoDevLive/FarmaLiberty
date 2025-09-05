// Imports variables y funciones
import { barra, topInicio, submitTestimonial } from "./variables.js";
import { reproducirVideo, validarFormTestimoniales } from "./funciones.js";

// Animación barra de navegación superior al escuchar por el primer scroll
document.addEventListener('scroll', () => {
    if (window.scrollY > topInicio) {
        barra.classList.add('header-fijo');
    } else {
        barra.classList.remove('header-fijo');
    }
});

// Sección Eventos (vídeo)
reproducirVideo();

// Formulario sección Testimoniales
submitTestimonial.addEventListener('click', e => {
    e.preventDefault();
    validarFormTestimoniales();
});

// Acceder al panel de administrador mediante combinación de teclas
document.addEventListener('keydown', e => {
    if (e.ctrlKey && e.altKey && e.key === 'a') {
        window.location.href = "/FarmaLiberty/admin/";
    }
});

// Actualiza el año del copyright en el footer
document.querySelector('#year').textContent = new Date().getFullYear();