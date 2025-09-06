const btnsEditar = document.querySelectorAll('.btn-secondary');
const btnsEliminar = document.querySelectorAll('.btn-destructive');


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
                    
                    
                })
                .catch(error => {
                    console.log(error);
                })
    });
});