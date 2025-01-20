<?php

use app\controllers\ApiExampleController;
use app\controllers\TrajetController;
use app\controllers\ChauffeurController;
use app\controllers\LoginController;
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

$loginController = new LoginController($app);
$router->get('/', [$loginController, 'afficherPage']);
$router->post('/login', [$loginController, 'login']);
$router->post('/register', [$loginController, 'inscription']);
