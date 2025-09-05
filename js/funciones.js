import { playBtns, modal, iframe, btnCerrar, body, videoContainer, formTestimoniales, company, ciudad, testimonial, modalContainer } from "./variables.js";

export function reproducirVideo() {
    playBtns.forEach(playBtn => {
        playBtn.addEventListener('click', e => {
            e.stopPropagation();
            modalContainer.classList.remove('invisible');
            iframe.setAttribute('src', 'https://www.youtube.com/embed/acm-YXpy8Bs?si=XpmoJL5kNJrXrHSp&autoplay=1');
            body.classList.add('bloquear-body');
            videoContainer.classList.add('acercar-video');
        });
    });

    iframe.addEventListener('click', e => e.stopPropagation());
    body.addEventListener('click', cerrarVideo);
    btnCerrar.addEventListener('click', cerrarVideo);
}

function cerrarVideo() {
    modalContainer.classList.add('invisible');
    iframe.setAttribute('src', 'https://www.youtube.com/embed/acm-YXpy8Bs?si=XpmoJL5kNJrXrHSp');
    body.classList.remove('bloquear-body');
}

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

export function validarFormTestimoniales() {
    if (company.value.trim() == '' || ciudad.value.trim() == '' || testimonial.value.trim() == '') {
        let alerta = mostrarAlerta('error');
        if (alerta) {
            setTimeout(() => {
                alerta.remove();
            }, 3000);
        }
    } else {
        let alerta = mostrarAlerta('exito');
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
}


// Panel de administrador
export function manejarBotones(btns) {
    btns.forEach(btn => {
        btn.addEventListener('click', e => {
            e.stopPropagation();
            const id = e.target.getAttribute('data-id');
            const texto = e.target.getAttribute('data-action');
            mostrarAdvertencia(id, texto);
        });
    });
}

function mostrarAdvertencia(id, texto) {
    const advertencia = crearAdvertencia(id, texto);

    modalContainer.classList.remove('invisible');
    body.classList.add('bloquear-body');

    advertencia.addEventListener('click', e => e.stopPropagation());

    body.addEventListener('click', () => {
        cerrarAdvertencia(advertencia);
    });
}


function crearAdvertencia(id, texto) {
    const advertencia = document.createElement('div');
    const emoji = document.createElement('div');
    const p = document.createElement('p');
    const botonesAdvertencia = document.createElement('div');
    const btnConfirmar = document.createElement('button');
    const btnCancelar = document.createElement('button');

    advertencia.classList.add('advertencia-testimonial');
    botonesAdvertencia.classList.add('botones');

    switch (texto) {
        case "publicar":
            p.textContent = '¿Estás seguro de que deseas publicar este testimonial?';
            break;
        case "descartar":
            p.innerHTML = `¿Estás seguro de que deseas eliminar este testimonial? <br> Este cambio no podrá revertirse.`;
            p.style.textAlign = 'center';
            break;
        case "ocultar":
            p.textContent = '¿Estás seguro de que deseas ocultar este testimonial?';
            break;
        default:
            p.textContent = '¿Estás seguro de que deseas modificar este testimonial?';
            break;
    }

    emoji.innerHTML = `<svg  xmlns="http://www.w3.org/2000/svg"  width="70"  height="70"  viewBox="0 0 24 24"  fill="#fff130ff"  class="icon icon-tabler icons-tabler-filled icon-tabler-alert-triangle"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 1.67c.955 0 1.845 .467 2.39 1.247l.105 .16l8.114 13.548a2.914 2.914 0 0 1 -2.307 4.363l-.195 .008h-16.225a2.914 2.914 0 0 1 -2.582 -4.2l.099 -.185l8.11 -13.538a2.914 2.914 0 0 1 2.491 -1.403zm.01 13.33l-.127 .007a1 1 0 0 0 0 1.986l.117 .007l.127 -.007a1 1 0 0 0 0 -1.986l-.117 -.007zm-.01 -7a1 1 0 0 0 -.993 .883l-.007 .117v4l.007 .117a1 1 0 0 0 1.986 0l.007 -.117v-4l-.007 -.117a1 1 0 0 0 -.993 -.883z" /></svg>`;
    btnConfirmar.textContent = 'Confirmar';
    btnCancelar.textContent = 'Cancelar';

    botonesAdvertencia.append(btnConfirmar, btnCancelar);
    advertencia.append(emoji, p, botonesAdvertencia);
    modal.appendChild(advertencia);

    if (texto == 'publicar') {
        btnConfirmar.onclick = () => {
            aprobarTestimonial(id);
            cerrarAdvertencia(advertencia);
        };

        btnCancelar.onclick = () => {
            cerrarAdvertencia(advertencia);
        };
    } else if (texto == 'descartar') {
        btnConfirmar.onclick = () => {
            descartarTestimonial(id);
            cerrarAdvertencia(advertencia);
        };

        btnCancelar.onclick = () => {
            cerrarAdvertencia(advertencia);
        };
    } else if (texto == 'ocultar') {
        btnConfirmar.onclick = () => {
            ocultarTestimonial(id);
            cerrarAdvertencia(advertencia);
        };

        btnCancelar.onclick = () => {
            cerrarAdvertencia(advertencia);
        };
    }

    return advertencia;
}


function aprobarTestimonial(id) {

    fetch('../admin/aprobar_testimoniales.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: `id=${id}`
    })
        .then(response => {
            if (!response.ok) {
                throw new Error('No se pudo publicar el testimonio');
            }
            return response.text();
        })
        .then(data => {
            toast('toast-exito', data);
        })
        .catch(error => {
            toast('toast-error', error.message);
        })
}


function descartarTestimonial(id) {

    fetch('../admin/descartar_testimoniales.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: `id=${id}`
    })
        .then(response => {
            if (!response.ok) {
                throw new Error('No se pudo eliminar el testimonial');
            }
            return response.text();
        })
        .then(data => {
            toast('toast-exito', data);
        })
        .catch(error => {
            toast('toast-error', error.message);
        })
}

function ocultarTestimonial(id) {

    fetch('../admin/ocultar_testimoniales.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: `id=${id}`
    })
        .then(response => {
            if (!response.ok) {
                throw new Error('No se pudo ocultar el testimonial');
            }
            return response.text();
        })
        .then(data => {
            toast('toast-exito', data);
        })
        .catch(error => {
            toast('toast-error', error.message);
        })
}


function toast(tipo, cuerpo) {
    const alertaPublicado = document.createElement('p');

    alertaPublicado.classList.add(tipo);
    alertaPublicado.textContent = cuerpo;

    setTimeout(() => {
        alertaPublicado.classList.add('slide');
    }, 50);

    setTimeout(() => {
        alertaPublicado.classList.remove('slide');
    }, 3000);

    setTimeout(() => {
        alertaPublicado.remove();
    }, 4000);

    body.appendChild(alertaPublicado);
}

function cerrarAdvertencia(advertencia) {
    modalContainer.classList.add('invisible');
    body.classList.remove('bloquear-body');
    advertencia.remove();
}