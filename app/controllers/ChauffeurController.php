<?php

namespace app\controllers;

use app\models\ChauffeurModel;
use app\models\ProductModel;
use app\models\VehiculeModel;
use Flight;

class ChauffeurController
{

    public function __construct() {}

    public function index()
    {
        $chauffeurModel = new ChauffeurModel(Flight::db());
        $allChauffeurs = $chauffeurModel->getAllChauffeur();
        $data = ['page' => 'chauffeurs', 'chauffeurs' => $allChauffeurs];
        Flight::render('accueil', $data);
    }

    function ajouterChauffeur($nom, $tel)
    {
        // Validation des données
        if (empty($nom) || empty($tel)) {
            return "Erreur : Tous les champs sont obligatoires.";
        }

        if (!preg_match('/^[0-9]{10}$/', $tel)) {
            return "Erreur : Le numéro de téléphone doit contenir exactement 10 chiffres.";
        }

        // Connexion à la base de données
        $db = Flight::db();
        $stmt = $db->prepare("INSERT INTO Chauffeur (nom, tel) VALUES (?, ?)");

        // Exécution de la requête
        $stmt->execute([$nom, $tel]);

        return "Chauffeur inséré avec succès.";
    }

    public function afficherChauffeurV($date)
    {
        $chauffeurModel = new ChauffeurModel(Flight::db());
        //$chauffeurs = $chauffeurModel->getChaufferVehiculeParJour($date);
        $somme = $chauffeurModel->getSommeTrajetsParJour($date);
        $data = ['page' => 'chauffeurV', 'somme' => $somme];
        Flight::render('accueil', $data);
    }
}
