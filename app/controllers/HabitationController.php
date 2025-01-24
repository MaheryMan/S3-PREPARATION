<?php

namespace app\controllers;

use app\models\HabitationModel;
use Flight;

class HabitationController
{

    public function __construct() {}

    public function home()
    {
        Flight::render('index');
    }

    public function showAllHabitation()
    {
        $HabitationModel = new HabitationModel(Flight::db());
        $allHabitat = $HabitationModel->getAll();
        $data = ['habitats' => $allHabitat];
        Flight::render('allHouses', $data);
    }

    public function bookHabitation($id)
    {
        $HabitationModel = new HabitationModel(Flight::db());
        $OneHouse = $HabitationModel->getById($id);
        $additionnalPics = $HabitationModel->getAdditionalPhotos($id);
        $data = ['infoHabitat' => $OneHouse, 'otherPics' => $additionnalPics];
        Flight::render('house', $data);
    }
    public function checkAvailability()
    {
        $HabitationModel = new HabitationModel(Flight::db());

        // Récupération des données du formulaire
        $startDate = Flight::request()->data->startDate;
        $endDate = Flight::request()->data->endDate;
        $habitationId = Flight::request()->data->idCheck;

        // Vérification de la disponibilité
        $isAvailable = $HabitationModel->isAvailable($habitationId, $startDate, $endDate);

        if ($isAvailable) {
            // Afficher un message de confirmation
            Flight::render('reservation', [
                'habitationId' => $habitationId,
                'startDate' => $startDate,
                'endDate' => $endDate,
            ]);
        } else {
            // Si indisponible, redirection avec un message d'erreur
            Flight::redirect("/habitations/book/$habitationId?status=unavailable");
        }
    }
    public function reserveHabitation()
    {
        session_start();
        // Récupérer les données du formulaire
        $habitationId = Flight::request()->data->habitationId;
        $startDate = Flight::request()->data->startDate;
        $endDate = Flight::request()->data->endDate;

        // Ajouter la réservation
        $HabitationModel = new HabitationModel(Flight::db());
        $success = $HabitationModel->addReservation($habitationId, $_SESSION['userid'], $startDate, $endDate); // Remplacez "1" par l'ID de l'utilisateur connecté

        if ($success) {
            Flight::redirect("/habitations/book/$habitationId?status=reserved");
        } else {
            Flight::redirect("/habitations/book/$habitationId?status=error");
        }
    }
}
