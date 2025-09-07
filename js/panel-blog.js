const btnsEditar = document.querySelectorAll('.btn-secondary');
const btnsEliminar = document.querySelectorAll('.btn-destructive');
const btnCerrar = document.querySelector('.btn-cerrar');
const modalContainer = document.querySelector('.modal-container');
const modal = document.querySelector('.modal');
const titulo = document.querySelector('#titulo');
const intro = document.querySelector('#intro');
const contenido = document.querySelector('#contenido');
const inputID = document.querySelector('#id');
const body = document.querySelector('body');
const formBlog = document.querySelector('#form-blog');
const crearBtn = document.querySelector('.crear-post');


btnsEditar.forEach(btn => {
    btn.addEventListener('click', e => {
        e.stopPropagation();

        document.querySelector('#titulo-form-blog').textContent = 'Editar Post';

        formBlog.setAttribute('action', 'editar_post.php');
        document.querySelector('#submit-form-blog').setAttribute('value', 'Editar');


        formBlog.addEventListener('click', e => {
            e.stopPropagation();
        })

        const id = e.currentTarget.getAttribute('data-id');
        let postData;
        modalContainer.classList.remove('invisible');
        body.classList.add('bloquear-body');

        fetch(`../get-post.php?id=${id}`, {
            method: 'GET'
        })
            .then(response => {
                if (!response.ok) {
                    throw new Error('No se pudo recuperar el testimonial');
                }
                return response.text();
            })
            .then(data => {
                postData = JSON.parse(data);
                inputID.value = postData.id;
                titulo.value = postData.titulo;
                intro.value = postData.intro;
                contenido.value = postData.contenido;
            })
            .catch(error => {
                console.log(error);
            })

        btnCerrar.addEventListener('click', () => {
            modalContainer.classList.add('invisible');
            body.classList.remove('bloquear-body');
            formBlog.reset();
        });

        body.addEventListener('click', () => {
            modalContainer.classList.add('invisible');
            body.classList.remove('bloquear-body');
            formBlog.reset();
        });
    });
});


btnsEliminar.forEach(btn => {
    btn.addEventListener('click', e => {
        const id = e.currentTarget.getAttribute('data-id');

        fetch(`eliminar_post.php?id=${id}`, {
            method: 'GET'
        })
            .then(response => {
                if (!response.ok) {
                    throw new Error('No se pudo eliminar el testimonial');
                }
                return response.text();
            })
            
        window.location.reload();
    })
})



crearBtn.addEventListener('click', e => {
    e.stopPropagation();

    modalContainer.classList.remove('invisible');
    body.classList.add('bloquear-body');

    document.querySelector('#titulo-form-blog').textContent = 'Crear Nuevo Post';

    formBlog.addEventListener('click', e => {
        e.stopPropagation();
    });

    formBlog.setAttribute('action', 'crear_post.php');
    document.querySelector('#submit-form-blog').setAttribute('value', 'Crear');

    btnCerrar.addEventListener('click', () => {
        modalContainer.classList.add('invisible');
        body.classList.remove('bloquear-body');
    });

    body.addEventListener('click', () => {
        modalContainer.classList.add('invisible');
        body.classList.remove('bloquear-body');
    });
})