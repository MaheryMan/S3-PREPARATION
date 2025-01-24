<?php

use app\controllers\HabitationController;
use app\controllers\HomeController;
use app\controllers\LoginController;
use app\controllers\AdminController;
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
$adminController = new AdminController($app);

$router->get('/home', [$Home_Controller, 'home']);

$loginController = new LoginController($app);
$router->get('/', [$loginController, 'afficherPage']);
$router->post('/login', [$loginController, 'login']);
$router->post('/register', [$loginController, 'inscription']);

$Habitation_Controller = new HabitationController();
$router->group('/habitations', function () use ($router, $Habitation_Controller) {
	$router->get('/all', [$Habitation_Controller, 'showAllHabitation']);
	$router->get('/book/@id', [$Habitation_Controller, 'bookHabitation']);
	$router->post('/check', [$Habitation_Controller, 'checkAvailability']);
	$router->post('/reserve', [$Habitation_Controller, 'reserveHabitation']);
});
$router->post('/loginAdmin', [$loginController, 'loginAdminController']);
$router->get('/adminForm', [$loginController, 'afficherLoginAdmin']);
$router->get('/admin', [$adminController, 'listerHabitation']);
$router->get("/ajouter", [$adminController, 'formHabitation']);
$router->post("/ajouter", [$adminController, 'addHabitation']);
$router->post("/modifier", [$adminController, 'modifForm']);
$router->post("/modification", [$adminController, 'modifierHabitation']);
$router->post("/supprimerPhoto", [$adminController, 'supprimerPhoto']);
$router->post("/supprimer", [$adminController, 'supprimerHabitation']);
