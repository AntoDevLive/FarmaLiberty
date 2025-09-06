const btnsEditar = document.querySelectorAll('.btn-secondary');
const btnsEliminar = document.querySelectorAll('.btn-destructive');
const modalContainer = document.querySelector('.modal-container');
const modal = document.querySelector('.modal');
const titulo = document.querySelector('#titulo');
const intro = document.querySelector('#intro');
const contenido = document.querySelector('#contenido');
const inputID = document.querySelector('#id');


btnsEditar.forEach(btn => {
    btn.addEventListener('click', e => {
        const id = e.currentTarget.getAttribute('data-id');
        let postData;
        modalContainer.classList.remove('invisible');

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
    });
});