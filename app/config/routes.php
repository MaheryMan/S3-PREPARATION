<?php

use app\controllers\HomeController;
use app\controllers\LoginController;
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

$Home_Controller = new HomeController();
$router->get('/home', [$Home_Controller, 'home']);

$loginController = new LoginController($app);
$router->get('/', [$loginController, 'afficherPage']);
$router->post('/login', [$loginController, 'login']);
$router->post('/register', [$loginController, 'inscription']);