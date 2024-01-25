document.addEventListener('DOMContentLoaded', function(){

    fetch("http://localhost/DAW/ikea/?controller=api&action=consultaReseñas", {
        method : 'POST',
    })
    .then(response => {
        return response.json();
    })
    .then(data => {
        mostrarReseñas(data);
    })
    .catch(error => {
        console.error(error);
    });
});

function mostrarReseñas(reseñas){
    const contenedor = document.getElementById('resenas');
    contenedor.classList.add("col-8");

    reseñas.forEach ((reseña) => {
        let article = document.createElement('article');
        let div2 = document.createElement('div');
        let div3 = document.createElement('div');
        let titulo = document.createElement('h5');
        let pComentario = document.createElement('p');

        article.classList.add("card", "rounded-0", "border-0", "border-bottom", "mb-3");
        div2.classList.add("card-body", "ps-0");

        div3.classList.add("d-flex");
        div3.innerHTML = `<svg width="24" height="24" viewBox="0 0 24 24" fill="black" >
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M10.6724 6.4678c.2734-.2812.6804-.4707 1.3493-.4707.3971 0 .705.0838.9529.2225.241.1348.4379.3311.5934.6193l.0033.006c.1394.2541.237.6185.237 1.1403 0 .7856-.2046 1.2451-.4796 1.5278l-.0048.005c-.2759.2876-.679.4764-1.334.4764-.3857 0-.6962-.082-.956-.2241-.2388-.1344-.4342-.3293-.5888-.6147-.1454-.275-.2419-.652-.2419-1.1704 0-.7902.2035-1.2442.4692-1.5174zm1.3493-2.4717c-1.0834 0-2.054.3262-2.7838 1.0766-.7376.7583-1.0358 1.781-1.0358 2.9125 0 .7656.1431 1.483.4773 2.112l.0031.0058c.3249.602.785 1.084 1.3777 1.4154l.0062.0035c.5874.323 1.2368.4736 1.9235.4736 1.0818 0 2.0484-.3333 2.7755-1.0896.7406-.7627 1.044-1.786 1.044-2.9207 0-.7629-.1421-1.4784-.482-2.0996-.3247-.6006-.7844-1.0815-1.376-1.4125-.5858-.3276-1.2388-.477-1.9297-.477zM6.4691 16.8582c.2983-.5803.7228-1.0273 1.29-1.3572.5582-.3191 1.2834-.5049 2.2209-.5049h4.04c.9375 0 1.6626.1858 2.2209.5049.5672.3299.9917.7769 1.29 1.3572.3031.5896.4691 1.2936.4691 2.1379v1h2v-1c0-1.1122-.2205-2.1384-.6904-3.0523a5.3218 5.3218 0 0 0-2.0722-2.1769c-.9279-.5315-2.0157-.7708-3.2174-.7708H9.98c-1.1145 0-2.2483.212-3.2225.7737-.8982.5215-1.5928 1.2515-2.0671 2.174C4.2205 16.8577 4 17.8839 4 18.9961v1h2v-1c0-.8443.166-1.5483.4691-2.1379z"></path>
                            </svg>`;

        titulo.classList.add("card-title", "ms-2");
        titulo.textContent = reseña.nombre_usuario;

        pComentario.classList.add("card-text");
        pComentario.textContent = `Comentario: ${reseña.comentario}`;

        let estrellasValoracion = generarValoracion(reseña.valoracion);

        contenedor.appendChild(article);
        article.appendChild(div2);
        div2.appendChild(div3);
        div3.appendChild(titulo);
        div2.appendChild(estrellasValoracion);
        div2.appendChild(pComentario);
    });

};

function generarValoracion(valoracion){
    let div = document.createElement('div');
    div.classList.add("d-flex");
    let temp;
    const estrella = `<div class="mb-3">
                        <svg width="20" height="20">
                            <path d="m11.9999 6 2.1245 3.6818 4.1255.9018-2.8125 3.1773L15.8626 18l-3.8627-1.7182L8.1372 18l.4252-4.2391-2.8125-3.1773 4.1255-.9018L11.9999 6z"></path>
                        </svg>
                    </div>`;
    const estrellaEmpty = `<div class="mb-3">
                            <svg width="20" height="20" fill="#929292">
                                <path d="m11.9999 6 2.1245 3.6818 4.1255.9018-2.8125 3.1773L15.8626 18l-3.8627-1.7182L8.1372 18l.4252-4.2391-2.8125-3.1773 4.1255-.9018L11.9999 6z"></path>
                            </svg>
                        </div>`;
    switch (valoracion) {
        case 1:
        div.innerHTML = estrella + estrellaEmpty + estrellaEmpty + estrellaEmpty + estrellaEmpty;
        break;
        case 2:
        div.innerHTML = estrella + estrella + estrellaEmpty + estrellaEmpty + estrellaEmpty;
        break;
        case 3:
        div.innerHTML = estrella + estrella + estrella + estrellaEmpty + estrellaEmpty;
        break;
        case 4:
        div.innerHTML = estrella + estrella + estrella + estrella + estrellaEmpty;
        break;
        case 5:
        div.innerHTML = estrella + estrella + estrella + estrella + estrella;
        break;
        default:
        div.innerHTML = estrellaEmpty + estrellaEmpty + estrellaEmpty + estrellaEmpty + estrellaEmpty;
    }
    return div;
};