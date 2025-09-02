const btnsAprobar = document.querySelectorAll('.btn-aprobar')
const btnsDescartar = document.querySelectorAll('.btn-descartar')
const btnsOcultar = document.querySelectorAll('.btn-ocultar')
const body = document.querySelector('body')
const mdoalContainer = document.querySelector('.modal-container');
const mdoal = document.querySelector('.modal');


btnsAprobar.forEach(btn => {
    btn.addEventListener('click', e => {
        e.stopPropagation();
        const id = e.target.getAttribute('data-id');
        const texto = e.target.textContent.toLowerCase();
        mostrarAdvertencia(id, texto);
    })
})

btnsDescartar.forEach(btn => {
    btn.addEventListener('click', e => {
        e.stopPropagation();
        const id = e.target.getAttribute('data-id');
        const texto = e.target.textContent.toLowerCase();
        mostrarAdvertencia(id, texto);
    })
})

btnsOcultar.forEach(btn => {
    btn.addEventListener('click', e => {
        e.stopPropagation();
        const id = e.target.getAttribute('data-id');
        const texto = e.target.textContent.toLowerCase();
        mostrarAdvertencia(id, texto);
    })
})


function mostrarAdvertencia(id, texto) {
    const advertencia = crearAdvertencia(id, texto);

    mdoalContainer.classList.remove('invisible');
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
    const btnCerrar = document.createElement('button');

    advertencia.classList.add('advertencia-testimonial')
    botonesAdvertencia.classList.add('botones')
    btnCerrar.classList.add('btn-cerrar')

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
    mdoal.appendChild(advertencia);

    if(texto == 'publicar') {
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
    mdoalContainer.classList.add('invisible');
    body.classList.remove('bloquear-body');
    advertencia.remove();
}