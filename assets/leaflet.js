// Get the user's current position
navigator.geolocation.getCurrentPosition(function (position) {
    var lat = position.coords.latitude;
    var lon = position.coords.longitude;

    // // Initialize the map and set its view to London coordinates [lat, lng] and zoom level 13
    var map = L.map('map').setView([lat, lon], 13);

    L.marker([lat, lon]).addTo(map)
        .bindPopup("You are here: <br>Latitude: " + lat + "<br>Longitude: " + lon )
        .openPopup();

    // Add the OpenStreetMap tile layer
    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);

    var Geodata = L.icon({
        iconUrl: 'assets/Logo_Geodata_Paris.png',
        iconSize: [95,38],
        iconAnchor: [22, 94],
        popupAnchor: [-3, -76],
    });

    var marker =L.marker([48.841012, 2.587152], {icon: Geodata}).addTo(map);

    marker.bindPopup("<b>Géodata Paris</b>").openPopup();

    var popup = L.popup();

    function onMapClick(e) {
    popup
        .setLatLng(e.latlng)
        .setContent("You clicked the map at " + e.latlng.toString())
        .openOn(map);
    }
    map.on('click', onMapClick);
});

Vue.createApp({
  data() {
    return {
         search: '',
        
    };
  },
  
  computed: {
    
  },

  methods: {
    geocode() {
         let url = 'https://data.geopf.fr/geocodage/search?q=' + this.search;

        fetch(url)
        .then(response => {
            return response.geojson();
        })
        .then(data => {

            console.log(data);

        }) 
  }},

}).mount('#entete');

