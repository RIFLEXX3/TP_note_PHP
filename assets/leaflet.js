// Création de la carte Leaflet

var map = L.map('map').setView([45.757, 4.833], 10); // INITIALISATION DE LA CARTE SUR PARIS

L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);

var marker = L.geoJSON().addTo(map);

var popup = L.popup();

function onMapClick(e) {
popup
    .setLatLng(e.latlng)
    .setContent("You clicked the map at " + e.latlng.toString())
    .openOn(map);
}
map.on('click', onMapClick);


// Demande de la position de l'utilisateur et affichage de la carte centrée sur sa position

navigator.geolocation.getCurrentPosition(function (position) {
    var lat = position.coords.latitude;
    var lon = position.coords.longitude;

    map.setView([lat, lon], 13); // L.map('map').setView([lat, lon], 13);

    L.marker([lat, lon]).addTo(map)
        // .bindPopup("You are here: <br>Latitude: " + lat + "<br>Longitude: " + lon )
        .bindPopup("Vous êtes ici")
        .openPopup();
});

//Vue.js pour la recherche d'une adresse et affichage sur la carte

Vue.createApp({
  data() {
    return {
        search: '',
        villes: [],
    };
  },
  
  computed: {
    urlrecherche() {
        return 'https://data.geopf.fr/geocodage/search?q=' + this.search;
    },
  },

  methods: {
    geocode() {
        // let url = 'https://data.geopf.fr/geocodage/search?q=' + this.search;
        
        this.villes = []; // vider la liste des villes après le clic sur une ville
        fetch(this.urlrecherche)
        .then(response => response.json())
        .then(result => {
            // let lon = result.features[0].geometry.coordinates[0];
            // let lat = result.features[0].geometry.coordinates[1];
            // let nom = result.features[0].properties.label;
            // if (marker) {
            //     map.removeLayer(marker);
            // }
            // marker = L.marker([lat, lon]).addTo(map);
            // marker.bindPopup(nom).openPopup();
            // map.setView([lat, lon], 12);

            // // marker = L.geoJSON(result.features).addTo(this.map);
            // // console.log(result);
            // // console.log("MAP:", this.map);
            // // L.geoJSON(result.features).addTo(this.map);

            marker.clearLayers();
            marker.addData(result);   // = L.geoJSON(result.features).addTo(map);
            
            let bounds = marker.getBounds();
            map.fitBounds(bounds);

        })
    },
    autocomplete() {
        let url = '/villes?recherche=' + this.search;
        console.log(url);
        fetch(url)
        .then(res => res.json())
        .then(result => {
            this.villes = result;
        })
    },
    recupGeometry(ville){ // insee = code commune, parametre de la fonction
        this.villes = []; // vider la liste des villes après le clic sur une ville
        this.search = ville.nom; // laisse le nom de la ville dans la barre de recherche après le clic sur une ville
        let url = '/villes2?insee=' + ville.insee;
        console.log(url);
        fetch(url)
        .then(res => {
            console.log(res); 
            return res.json()
        })
        .then(result => {
            console.log(result);
            marker.clearLayers();
            marker.addData(result); //ou  marker.addData(result.geom);
            let bounds = marker.getBounds();
            map.fitBounds(bounds);
        })
    }
}

}).mount('#entete');