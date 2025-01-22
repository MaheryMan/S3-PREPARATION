<?php

namespace app\controllers;

use app\models\AdminModel;
use app\models\LoginModel;
use app\models\UtilisateurModel;
use Flight;

class LoginController
{
    private $model;

    public function __construct($app) {}

    public function listerHabitation(){
        $this->model = new AdminModel(Flight::db());
        $habitations = $this->model->listerHabitation();
        $data = ['page' => 'listeAdmin','habitations' => $habitations];
        Flight::render('admin', $data);
    }
}
