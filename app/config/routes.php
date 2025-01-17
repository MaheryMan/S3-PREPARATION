<?php

use app\controllers\ApiExampleController;
use app\controllers\TrajetController;
use app\controllers\ChauffeurController;
use app\controllers\VehiculeController;
use flight\Engine;
use flight\net\Router;
//use Flight;

/** 
 * @var Router $router 
 * @var Engine $app
 */
/*$router->get('/', function() use ($app) {
	$Welcome_Controller = new TrajetController($app);
	$app->render('welcome', [ 'message' => 'It works!!' ]);
});*/

$Chauffeur_Controller = new ChauffeurController();
$router->get('/chauffeurs', [$Chauffeur_Controller, 'index']);

$Vehicule_Controller = new VehiculeController();
$router->get('/vehicules', [$Vehicule_Controller, 'index']);

$Trajet_Controller = new TrajetController();
$router->get('/', [$Trajet_Controller, 'afficher']);
$router->get('/formulaire', [$Trajet_Controller, 'trajetform']);
$router->get('/trajets', [$Trajet_Controller, 'afficher']);



// traitement des insertion
Flight::route('GET /submit_trajet', function () {
    // Récupérer les données du formulaire
    $id_chauffeur = Flight::request()->query['id_chauffeur'];
    $id_vehicule = Flight::request()->query['id_vehicule'];
    $date_debut = Flight::request()->query['date_debut'];
    $date_fin = Flight::request()->query['date_fin'];
    $montant_recette = Flight::request()->query['montant_recette'];
    $montant_carburant = Flight::request()->query['montant_carburant'];
    $distance_km = Flight::request()->query['distance_km'];

    // Appeler la fonction du controller
    $controller = new TrajetController();
    $resultat = $controller->ajouterTrajet($id_chauffeur, $id_vehicule, $date_debut, $date_fin, $montant_recette, $montant_carburant, $distance_km);

    Flight::redirect('/');
});
Flight::route('GET /submit_vehicule', function () {
    // Récupérer les données du formulaire
    $immatriculation = Flight::request()->query['immatriculation'];
    $modele = Flight::request()->query['modele'];

    // Appeler la fonction du controller
    $controller = new VehiculeController();
    $resultat = $controller->ajouterVehicule($immatriculation, $modele);
    Flight::redirect('/');
});
Flight::route('GET /submit_chauffeur', function () {
    // Récupérer les données du formulaire
    $nom = Flight::request()->query['nom'];
    $tel = Flight::request()->query['tel'];

    // Appeler la fonction du controller
    $controller = new ChauffeurController;
    $resultat = $controller->ajouterChauffeur($nom, $tel);
    Flight::redirect('/');
});

Flight::route('GET /chauffeurVehicule', function () {
    $date = Flight::request()->query['date'] ?? null;
    // Débogage : affiche la date reçue
    error_log("Date reçue via GET : " . var_export($date, true));

    if (!$date) {
        $data = ['page' => 'chauffeurV', 'trajets' => []];
        Flight::render('accueil', $data);
    } else {
        $controller = new ChauffeurController();
        $controller->afficherChauffeurV($date);
    }
});
Flight::route('GET /benefice', function () {
    $date = Flight::request()->query['date'] ?? null;
    // Débogage : affiche la date reçue
    error_log("Date reçue via GET : " . var_export($date, true));

    if (!$date) {
        $data = ['page' => 'beneficeVehicule', 'trajets' => []];
        Flight::render('accueil', $data);
    } else {
        $controller = new VehiculeController();
        $controller->afficherBenefice($date);
    }
});
Flight::route('GET /trajetRentable', function () {
    $date = Flight::request()->query['date'] ?? null;
    // Débogage : affiche la date reçue
    error_log("Date reçue via GET : " . var_export($date, true));

    if (!$date) {
        $data = ['page' => 'trajetRentable', 'trajets' => []];
        Flight::render('accueil', $data);
    } else {
        $controller = new TrajetController();
        $controller->rentable($date);
    }
});
Flight::route('GET /vehiculeDisponible', function () {
    $date = Flight::request()->query['date'] ?? null;
    // Débogage : affiche la date reçue
    error_log("Date reçue via GET : " . var_export($date, true));

    if (!$date) {
        $data = ['page' => 'vehiculeDisponible', 'trajets' => []];
        Flight::render('accueil', $data);
    } else {
        $controller = new TrajetController();
        $controller->rentable($date);
    }
});
