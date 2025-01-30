// Le estoy diciendo que cuando se cargue la pagina se llama a esta función
window.addEventListener("load", pidecripto);

// Esta función llamará a la URL para recoger todas las razas de perros
function pidecripto(){
    fetch("https://api.coingecko.com/api/v3/coins/markets?vs_currency=usd&order=market_cap_desc&per_page=100&page=1&sparkline=false")
        .then((response) => {
            var  coindata = response.data;
                if (coindata){

                }
        })
        .then((j) => muestracripto(j));
}

// Recorre el JSON y rellena el datalist con la información de las razas
function muestracripto(b) {
    // Iteramos sobre el json
    for(var idm in b.data) {
        console.log(idm); // Muestra las palabras "affenpinscher", "african", etc.
        let criptoDatalist = document.getElementById("cript")
        criptoDatalist.innerHTML +="<option value='" + idm + "'>";
    }
}

/*
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CoinGecko API</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .coin {
            border: 1px solid #ddd;
            padding: 10px;
            margin-bottom: 10px;
        }
        .coin img {
            width: 20px;
            height: 20px;
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <h1>CoinGecko API</h1>
    <input type="text" id="search-input" placeholder="Buscar moneda...">
    <button id="search-button">Buscar</button>
    <div id="coin-info"></div>

    <script src="https://cdn.jsdelivr.net/npm/axios@0.21.1/dist/axios.min.js"></script>
    <script>
        const searchInput = document.getElementById('search-input');
        const searchButton = document.getElementById('search-button');
        const coinInfoDiv = document.getElementById('coin-info');

        searchButton.addEventListener('click', () => {
            const searchTerm = searchInput.value.trim();
            if (searchTerm !== '') {
                const url = `https://api.coingecko.com/api/v3/coins/${searchTerm}?localization=false&tickers=false&market_data=true&community_data=false&developer_data=false&sparkline=false`;

                axios.get(url)
                    .then(response => {
                        const coinData = response.data;
                        if (coinData) {
                            const name = coinData.name;
                            const image = coinData.image.large;
                            const priceChangePercentage24h = coinData.market_data.price_change_percentage_24h;

                            let estado;
                            if (priceChangePercentage24h > 0) {
                                estado = 'En alza';
                            } else if (priceChangePercentage24h < 0) {
                                estado = 'En baja';
                            } else {
                                estado = 'Estable';
                            }

                            coinInfoDiv.innerHTML = `
                                <div class="coin">
                                    <img src="${image}" alt="${name}">
                                    ${name}
                                    - Estado: ${estado}
                                    - Precio actual: $${coinData.market_data.current_price.usd}
                                    - Cambio en 24 horas: ${priceChangePercentage24h}%
                                </div>
                            `;
                        } else {
                            coinInfoDiv.innerHTML = 'Moneda no encontrada';
                        }
                    })
                    .catch(error => console.error('Error:', error));
            } else {
                coinInfoDiv.innerHTML = 'Por favor, ingresa una moneda para buscar';
            }
        });
    </script>
</body>
</html>
*/


/*
// Mapeo el boton de cargar imagen
let cargaImagen = document.getElementById("cargar");
cargaImagen.addEventListener("click",generarImagen);

// Esta funcion recoge la raza seleccionada, llama a la API y obtiene la IMG, y la muestra
function generarImagen(){
    let criptoSeleccionada = document.getElementById("criptoInput").value;
    fetch("https://coin-images.coingecko.com/coins/images/1/large/"+razaSeleccionada+"/images/random")
        .then((response) => response.json())
        .then((x) => muestraImagen(x));
}

// Muestro la imagen en el body del HTML
function muestraImagen(w){
    let resultado = document.getElementById("resultado");
    resultado.innerHTML = "<img src='"+w.message+"'>";
}

*/






