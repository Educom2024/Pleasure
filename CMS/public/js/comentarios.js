const cajaComentarios = document.querySelector('.comentarios__container__box');
const url = location.href;
const urlArray = url.split("=");
const id = +urlArray[1];

const fechaOption ={
    wekkday: 'short',
    year: 'numeric',
    month: 'short',
    day: 'numeric'
}

const renderComentario = comentario => {

    const fecha = new Date(comentario.com_fecha);
    
    let plantillaEstrellas = '';

    for(let i = 0; i < comentario.com_puntaje; i++){
        plantillaEstrellas += '<i class="fa-solid fa-star"></i>';
    }
    if(comentario.com_puntaje !== 5){
        for(let j = 0; j < 5 - comentario.com_puntaje; j++){
            plantillaEstrellas += '<i class="fa-regular fa-star"></i>'
        }
    }
    return `
        <div class="comentarios__container__box__item">
            <div class="comentarios__container__box__item__imgBox">
                <img src="img/${!comentario.user_img ? 'user.png' : comentario.user_img}" alt="${comentario.usuario}">
            </div>
            <div class="comentarios__container__box__item__data">
                <div class="comentarios__container__box__item__data__top">
                    <span>${comentario.usuario}</span>
                    <span>${fecha.toLocaleDateString("es-ES", fechaOption)}</span>
                </div>
                <p class="comentarios__container__box__item__data__descri mt-1">
                    ${comentario.com_mensaje}
                </p>
                <div class="comentarios__container__box__item__data__stars mt-1">
                ${plantillaEstrellas}
                </div>
            </div>
        </div>
    `;
}

axios.get(`apiRequests/getComentarios.php`, {
    params: {
        id,
    }
})
    .then(res => {
    // console.log(res.data);
        const plantilla = res.data.map(renderComentario).join('');
        // console.log(plantilla);
        cajaComentarios.innerHTML = plantilla;
    })
    .catch(err => {
        console.log(err)
    })