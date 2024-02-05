document.addEventListener('DOMContentLoaded', function(){

    

    fetch("http://localhost/DAW/ikea/?controller=api&action=consultaProductos", {
        method : 'POST',
    })
    .then(response => {
        return response.json();
    })
    .then(data => {
        // console.log(data);
        mostrarProductos(data);
    })
    .catch(error => {
        console.error(error);
    });
});

//Array para guardar los productos y filtrar estos mismos
let arrayProductos;

function mostrarProductos(productos){
    arrayProductos = productos;
    buscarCategorias();
    
};

function buscarCategorias() {
    let allFiltros = document.querySelectorAll('.filtrosProd:checked');

    allFiltros.forEach(filtro => {
        if (filtro.checked) {
            montarProductos(filtro.id);
        }

        filtro.addEventListener('change', function(e) {
            if (this.checked) {
                montarProductos(this.id);
            }
        });
    });    
}


function montarProductos(categoria){
    let arrayFiltrado = arrayProductos.filter((producto) => producto.categoria == categoria);
    // console.log(arrayProductos);
}