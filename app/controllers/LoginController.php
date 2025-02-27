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
        session_start();
        $this->model = new LoginModel(Flight::db());
        $email = Flight::request()->data->email;
        $password = Flight::request()->data->password;
        $user = new UtilisateurModel(Flight::db());

        if ($this->model->login($email, $password)) {
            $id = $user->getId($email);
            $_SESSION['userid'] = $id;
            Flight::redirect('/home');
        } else {
            Flight::render('login', ['message' => 'Identifiants incorrects']);
        }
    }

    public function loginAdminController(){
        $this->model = new LoginModel(Flight::db());
        $nom = Flight::request()->data->nom;
        $password = Flight::request()->data->password;

        if ($this->model->loginAdmin($nom, $password)) {
            $_SESSION['nom'] = $nom;

            Flight::redirect('/admin');
        } else {
            Flight::render('login', ['message' => 'Identifiants incorrects']);
        }
    }
    // Mahery Code

    public function afficherLoginAdmin(){
        Flight::render('loginAdmin');
    }
    public function inscription()
    {
        session_start();
        $email = Flight::request()->data->email;
        $password = Flight::request()->data->password;
        $nom = Flight::request()->data->nom;
        $telephone = Flight::request()->data->telephone;
        $model = new LoginModel(Flight::db());
        $user = new UtilisateurModel(Flight::db());
        if ($model->inscription($email, $password, $nom, $telephone)) {
            $id = $user->getId($email);
            $_SESSION['userid'] = $id;
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
