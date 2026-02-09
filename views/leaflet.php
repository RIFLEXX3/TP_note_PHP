<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
    <link rel="stylesheet" href="/assets/leaflet.css">
    <title>Leaflet</title>
</head>
<body>

    <div id="entete">
        <form @submit.prevent="geocode">
            <input type="text" class="form-control" placeholder="Rechercher un lieu..." v-model="search" @input="autocomplete"> <!-- ajout de @input pour faire les recherches -->
            <!-- <p>{{ search }}</p> -->
            <button class="btn btn-primary">Rechercher</button>
        </form>
        <ul id="villes" v-if="villes.length">
            <li v-for="ville in villes" @click="recupGeometry(ville)">
                {{ ville.nom }} - {{ ville.insee }}
            </li>
        </ul>
    </div>

    <div id="map" ></div>

    <div id="coord"></div>

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="crossorigin=""></script>
    <script src="https://cdn.jsdelivr.net/npm/vue"></script>
    <script src="/assets/leaflet.js"></script>
    
</body>
</html>
