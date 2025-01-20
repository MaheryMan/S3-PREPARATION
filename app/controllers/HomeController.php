<?php

namespace app\controllers;

use app\models\ChauffeurModel;
use Flight;

class HomeController
{

    public function __construct() {}

    public function home()
    {
        Flight::render('index');
    }
}
