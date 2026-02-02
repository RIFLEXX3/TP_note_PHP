<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
    <title>Leaflet</title>
</head>
<body>

<h1>Cartographie avec Leaflet</h1>

<div id="map" style="height: 400px; width: 800px;"></div>

<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="crossorigin=""></script>

<script>
    // // Initialize the map and set its view to London coordinates [lat, lng] and zoom level 13
    var map = L.map('map').setView([51.505, -0.09], 13);

    // Add the OpenStreetMap tile layer
    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);

    var marker = L.marker([51.5, -0.09]).addTo(map);

    marker.bindPopup("<b>Hello world!</b><br>I am a popup.").openPopup();

    var popup = L.popup();

    function onMapClick(e) {
        popup
            .setLatLng(e.latlng)
            .setContent("You clicked the map at " + e.latlng.toString())
            .openOn(map);
    }

    map.on('click', onMapClick);

    navigator.geolocation.getCurrentPosition(function (position) {
    console.log(position.coords.latitude, position.coords.longitude, position.coords.altitude);
    });

    // navigator.geolocation.getCurrentPosition(function (position) {
    // const lat = position.coords.latitude;
    // const lng = position.coords.longitude;

    // // 1. Center the map on the user's location
    // map.setView([lat, lng], 13);

    // // 2. Add a special marker for the user
    // L.marker([lat, lng])
    //     .addTo(map)
    //     .bindPopup("<b>You are here!</b>")
    //     .openPopup();
    // });

</script>
    
</body>
</html>