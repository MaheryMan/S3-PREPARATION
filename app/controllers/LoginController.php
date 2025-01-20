<?php

namespace app\controllers;

use app\models\LoginModel;
use app\models\UtilisateurModel;
use Flight;

class LoginController
{
    private $model;

    public function __construct($app) {}

    public function login()
    {
        $this->model = new LoginModel(Flight::db());
        $email = Flight::request()->data->email;
        $password = Flight::request()->data->password;

        if ($this->model->login($email, $password)) {
            $_SESSION['email'] = $email;

            Flight::redirect('/home');
        } else {
            Flight::render('login', ['message' => 'Identifiants incorrects']);
        }
    }
    public function inscription()
    {
        $email = Flight::request()->data->email;
        $password = Flight::request()->data->password;
        $nom = Flight::request()->data->nom;
        $telephone = Flight::request()->data->telephone;
        $model = new LoginModel(Flight::db());
        $user = new UtilisateurModel(Flight::db());
        if ($model->inscription($email, $password, $nom, $telephone)) {
            $id = $user->getId($email);
            $_SESSION['user'] = $user->getUserById($id);
            Flight::redirect('/home');
        } else {
            Flight::render('inscription', ['message' => 'L\'email est déjà utilisé']);
        }
    }
    public function afficherPage()
    {
        Flight::render('login');
    }
}
