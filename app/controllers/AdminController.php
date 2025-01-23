<?php

namespace app\controllers;

use app\models\AdminModel;
use app\models\LoginModel;
use app\models\UtilisateurModel;
use app\models\HabitationModel;
use Flight;

class AdminController
{
    private $model;

    public function __construct($app) {

    }

    public function listerHabitation(){
        $this->model = new AdminModel(Flight::db());
        $habitations = $this->model->listerHabitation();
        $data = ['page' => 'listeAdmin','habitations' => $habitations];
        Flight::render('templateAdmin', $data);
    }

    public function formHabitation(){
        $this->model = new AdminModel(Flight::db());
        $types = $this->model->getTypeHabitation();
        $data = ['page' => 'ajoutUpload', 'types' => $types];
        Flight::render('templateAdmin', $data);
    }

    public static function addHabitation()
    {
        $db = Flight::db(); // Récupération de la connexion à la base de données
        $adminModel = new AdminModel($db);

        // Récupération des données du formulaire
        $type = Flight::request()->data->type_id ?? null;
        $chambres = Flight::request()->data->nb_chambres ?? null;
        $loyer_jour = Flight::request()->data->loyer_jour ?? null;
        $quartier = Flight::request()->data->quartier ?? null;
        $description = Flight::request()->data->description ?? null;

        // Vérification des champs obligatoires
        if (!$type || !$chambres || !$loyer_jour || !$quartier || !$description) {
            Flight::redirect('/ajout?error=empty_fields');
            return;
        }

        // Gestion des fichiers (photos)
        $photos = [];
        if (!empty($_FILES['photos']['name'][0])) {
            $uploadDir = 'assets/images/'; // Répertoire pour stocker les images
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true); // Crée le répertoire si inexistant
            }

            foreach ($_FILES['photos']['name'] as $key => $name) {
                $tmpName = $_FILES['photos']['tmp_name'][$key];
                $size = $_FILES['photos']['size'][$key];
                $extension = strrchr($name, '.'); // Récupère l'extension du fichier
                $allowedExtensions = ['.png', '.gif', '.jpg', '.jpeg'];
                $maxSize = 10000000; // 10 Mo

                // Vérifications de l'extension et de la taille
                if (!in_array($extension, $allowedExtensions)) {
                    Flight::redirect('/ajout?error=invalid_file_type');
                    return;
                }

                if ($size > $maxSize) {
                    Flight::redirect('/ajout?error=file_too_large');
                    return;
                }

                // Formatage du nom du fichier pour éviter les caractères spéciaux
                $formattedName = strtr($name,
                    'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ',
                    'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy'
                );
                $formattedName = preg_replace('/([^.a-z0-9]+)/i', '-', $formattedName);

                // Ajouter un timestamp pour éviter les conflits de noms
                $filePath = $uploadDir . time() . '-' . $formattedName;

                // Déplacement du fichier vers le répertoire cible
                if (move_uploaded_file($tmpName, $filePath)) {
                    $photos[] = $filePath; // Stocker le chemin relatif
                } else {
                    Flight::redirect('/ajout?error=upload_failed');
                    return;
                }
            }
        }

        // Ajout de l'habitation et des photos dans la base de données
        $habitationId = $adminModel->ajouterHabitation($type, $chambres, $loyer_jour, $quartier, $description, $photos);
        Flight::redirect('/ajouter');
    }
    public function modifForm(){
        $this->model = new AdminModel(Flight::db());
        $id = Flight::request()->data->habitation_id ?? null;
        $id = Flight::request()->data->habitation_id ?? null;
        $habitation = $this->model->getHabitation($id);
        $types = $this->model->getTypeHabitation();
        $photos = $this->model->getPhotosbyId($id);
        $data = ['page' => 'modification', 'habitation' => $habitation, 'types' => $types, 'photos'=> $photos];
        Flight::render('templateAdmin', $data);
    }
    public function supprimerPhoto(){
        $this->model = new AdminModel(Flight::db());
        $photo_id = Flight::request()->data->photo_id ?? null;
        $habitation_id = Flight::request()->data->habitation_id ?? null;
    
        // Get photo path before deletion to delete file
        $photoUrl = $this->model->getUrlPhoto($photo_id);
        if ($photoUrl && file_exists($photoUrl)) {
            unlink($photoUrl); // Delete physical file
        }
    
        // Delete from database
        if ($this->model->supprimerPhoto($photo_id)) {
            Flight::redirect('/modifier?habitation_id=' . $habitation_id);
        } else {
            Flight::redirect('/modifier?habitation_id=' . $habitation_id);
        }
    }
}
