$(document).ready(function(){
    let map;

    async function initMap() {
        const position = { lat: -7.121077, lng: -34.874865 };
        const { Map } = await google.maps.importLibrary("maps");

        map = new Map(document.getElementById("map"), {
            zoom: 13,
            center: position
        });

        addMarker({ lat: -7.134789, lng: -34.872456 });
        addMarker({ lat: -7.119802, lng: -34.869145 });
        addMarker({ lat: -7.119630, lng: -34.834406 });
        addMarker({ lat: -7.117990, lng: -34.839835 });
        addMarker({ lat: -7.113175, lng: -34.822620 });
        addMarker({ lat: -7.125943, lng: -34.823637 });
        addMarker({ lat: -7.122629, lng: -34.915714 });
        addMarker({ lat: -7.122629, lng: -34.915714 });
        addMarker({ lat: -7.129344, lng: -34.930574 });

        function addMarker(coords) {
            var marker = new google.maps.Marker({
                map: map,
                position: coords
            });

            var indice = Math.floor(Math.random() * placas.length)
            var placa = placas[indice];
            var motorista = nomes[indice];
            placas.splice(indice, 1);
            nomes.splice(indice, 1);

            var content = '<ul class="list-group">' +
                '<li class="list-group-item">Placa: ' + placa + '</li>' +
                '<li class="list-group-item">Motorista: ' + motorista + '</li>' +
                '</li>' +
                '</ul>';
            console.log(placas)
            console.log(nomes)
            var infowindow = new google.maps.InfoWindow({
                content: content
            });

            marker.addListener("click", () => {
                infowindow.open(map, marker)
            });
        }
    }

    var placas = ['MMQ-9590', 'MNL-2435', 'MON-9435', 'MOO-0669', 'HQB-1779', 'KFT-8792', 'KKG-4003', 'KGM-7957', 'KMH-7957', , 'MUN-5986'];
    var nomes = ['Antonio Moraes', 'Heitor Silva', 'Juan Fernandes', 'Marcos Gomes', 'Jonas Costa', 'Rafael Oliveira', 'Daniel Cruz', 'Luiz Nogueira', 'Felipe Monteiro', 'Ivo Lima'];

    initMap();
});