const inicio = document.querySelector('#inicio');
const barra = document.querySelector('.barra-bg');
const topInicio = inicio.getBoundingClientRect().top;


document.addEventListener('scroll', () => {
    if (window.scrollY > topInicio) {
        barra.classList.add('header-fijo');
    } else {
        barra.classList.remove('header-fijo');
    }
})


const playBtns = document.querySelectorAll('.btn-video');
const mdoal = document.querySelector('.modal-container');
const iframe = document.querySelector('#video-iframe');
const btnCerrar = document.querySelector('#btn-cerrar');
const body = document.querySelector('body');
const videoContainer = document.querySelector('.video-container');

playBtns.forEach(playBtn => {
    playBtn.addEventListener('click', e => {
        e.stopPropagation();
        mdoal.classList.remove('invisible');
        iframe.setAttribute('src', 'https://www.youtube.com/embed/acm-YXpy8Bs?si=XpmoJL5kNJrXrHSp&autoplay=1');
        body.classList.add('bloquear-body');
        videoContainer.classList.add('acercar-video');
    });

    iframe.addEventListener('click', e => e.stopPropagation());
    body.addEventListener('click', cerrarVideo);
    btnCerrar.addEventListener('click', cerrarVideo);
});



function cerrarVideo() {
    mdoal.classList.add('invisible');
    iframe.setAttribute('src', 'https://www.youtube.com/embed/acm-YXpy8Bs?si=XpmoJL5kNJrXrHSp');
    body.classList.remove('bloquear-body');
}

document.querySelector('#year').textContent = new Date().getFullYear();


const formTestimoniales = document.querySelector('#form-testimoniales');
const company = document.querySelector('#company-input');
const ciudad = document.querySelector('#ciudad-input');
const testimonial = document.querySelector('#testimonial-mensaje');
const submitTestimonial = document.querySelector('#submit-testimonial');


submitTestimonial.addEventListener('click', e => {
    e.preventDefault();

    if (company.value.trim() == '' || ciudad.value.trim() == '' || testimonial.value.trim() == '') {
        let alerta = mostrarAlerta('error');
        if (alerta) {
            setTimeout(() => {
                alerta.remove();
            }, 3000);
        }
    } else {
         alerta = mostrarAlerta('exito');
        if (alerta) {
            setTimeout(() => {
                formTestimoniales.submit();
            }, 1000);
            setTimeout(() => {
                alerta.remove();
                formTestimoniales.reset();
            }, 3000);

        }
    }
})


    function mostrarAlerta(tipo) {
        const existeAlerta = document.querySelector('.alerta');
        if (!existeAlerta) {
            const div = document.createElement('div');
            div.classList.add('alerta');
            const p = document.createElement('p');

            if (tipo == 'error') {
                div.classList.add('error');
                p.textContent = 'Todos los campos son obligatorios';
            } else {
                div.classList.add('exito');
                p.textContent = 'Enviado correctamente';
            }

            div.appendChild(p);
            formTestimoniales.appendChild(div);

            return div;
        }

        return null;
    }


// Acceder al panel de administrador mediante combinación de teclas
document.addEventListener('keydown', e => {
    if (e.ctrlKey && e.altKey && e.key === 'a') {
        window.location.href = "/FarmaLiberty/admin/";
    }
});