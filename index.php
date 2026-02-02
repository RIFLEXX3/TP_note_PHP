<?php

declare(strict_types=1);

require_once 'flight/Flight.php';
// require 'flight/autoload.php';


#connexion à la base de données
// $link = mysqli_connect('u2.ensg.eu', 'geo', '', 'geobase');
// $link = mysqli_connect('serveur','login','password','bdd');
$link = mysqli_connect('localhost','root','root','geobase');
    if (!$link) {
    die('Erreur de connexion');
    } //else {
    //echo 'Succès de connexion ';
    //}
mysqli_set_charset($link, "utf8");

// stocker une variable globale
Flight::set('geobase', $link);
// récupérer la variable
Flight::get('geobase');


#routes
Flight::route('/', function() {
    Flight::render('accueil');
});

Flight::route('/today', function () {
    $moisFr = ['janvier', 'février', 'mars', 'avril', 'mai', 'juin', 'juillet', 'août', 'septembre', 'octobre', 'novembre', 'décembre'];
    $moisEnCours = $moisFr[date('n') - 1];
    $joursFr = ['lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi', 'dimanche'];
    $jourEnCours = $joursFr[date('N') - 1];
    $dateJour = $jourEnCours .' '. date('d') .' '. $moisEnCours .' '. date('Y');;
    Flight::render('today', [
        'dateJour' => $dateJour,
        'moisFr' => $moisFr, 
        'joursFr' => $joursFr,
        'jourEnCours' => $jourEnCours]);
});

Flight::route('GET /login', function() {
    $user = null;
    // if (isset($_GET['user'])) {
        //$user = $_GET['user'];
    //}

    if (isset($_SESSION['user'])) {
        $user = $_SESSION['user'];
    }

    Flight::render('login', ['user' => $user]);
});

Flight::route('POST /login', function() {
    $user = $_POST['user'];
    $_SESSION['user'] = $user;
    Flight::render('login', ['user' => $user]);
});

Flight::route('/logout', function() {
    $_SESSION = [];
    echo 'Vous êtes déconnecté.';
    Flight::redirect('/login'); //pour la déconnexion, pas obligé de faire une page html. ici on a créé une nouvelle route.
});

// Flight::route('/departement', function() {
//     $link = Flight::get('geobase');
//     //$results = mysqli_query($link, "SELECT insee, nom FROM departements");
//     //Flight::render('departement', ['results' => $results]);

//     $regionInsee = $_GET['region'] ?? null;

//     if ($regionInsee) {
//         $query = "SELECT insee, nom FROM departements WHERE region_insee = '$regionInsee' ORDER BY insee";
//     } else {
//         $query = "SELECT insee, nom FROM departements ORDER BY insee";
//     }

//     $departements = mysqli_query($link, $query);
//     Flight::render('departement', ['departements' => $departements, 'regionInsee' => $regionInsee]);

// });

Flight::route('/departement', function() {
    $link = Flight::get('geobase');
    //$query = 'SELECT insee, nom FROM departements';
    $departements = [];
    $regions = mysqli_query($link, 'SELECT insee, nom FROM regions ORDER BY nom');

    if (isset($_GET['region'])) {
        $departements = mysqli_query($link, 'SELECT insee, nom FROM departements WHERE region_insee = ' . $_GET['region']);        
    } 

    Flight::render('departement', [
        'departements' => $departements, 
        'regions' => $regions,
    ]);

});

// Flight::route('/region', function(){
//     $link = Flight::get('geobase');
//     $regions = mysqli_query($link, "SELECT insee, nom FROM regions");
//     Flight::render('region', ['regions' => $regions]);
// });

// Flight::route('/commune', function(){
//     $link = Flight::get('geobase');
//     $query = 'SELECT insee, nom FROM communes ORDER BY insee';
//     $communes = mysqli_query($link, $query);

//     Flight::render('commune', [
//         'communes' => $communes
//     ]);

// });

Flight::route('/commune', function(){
    $link = Flight::get('geobase');
    $communes = [];   
    $nomDepChoisi = null;
    $departements = mysqli_query($link, 'SELECT insee, nom FROM departements ORDER BY nom');

    if (isset($_GET['departement'])) {
        $communes = mysqli_query($link, 'SELECT insee, nom FROM communes WHERE departement_insee = ' . $_GET['departement'] .' ORDER BY insee ');        
    
    } 

    // // 2. On récupère spécifiquement le nom du département sélectionné
    //     $dep_insee = ($link, SELECT nom FROM departements WHERE insee = $departement['insee'];)  
    //     $res = mysqli_query($link, "SELECT nom FROM departements WHERE insee = '$dep_insee' LIMIT 1");
    //     $dep = mysqli_fetch_assoc($res);
    //     if ($dep) {
    //         $nomDepChoisi = $dep['nom'];
    //     }

    Flight::render('commune', [
        'communes' => $communes,
        'departements' => $departements
        // 'nomDepChoisi' => $nomDepChoisi
    ]);

});

Flight::route('/jeu', function(){
    Flight::render('jeu');
});

Flight::route('/map', function(){
    // Flight::render('map');
    Flight::render('leaflet');
});

// Flight::route('/commune', function(){
//     $link = Flight::get('geobase');
//     $departements = mysqli_query($link, 'SELECT insee, nom FROM departements ORDER BY nom');

//     $communes = mysqli_query($link, 'SELECT insee, nom FROM communes WHERE departement_insee = ' . $_GET['departement'] .' ORDER BY insee ');        

//     Flight::render('commune', [
//         'communes' => $communes,
//         'departements' => $departements
//     ]);


    // Flight::redirect('/commune');
// });

Flight::start();

?>