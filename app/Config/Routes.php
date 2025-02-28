<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/app-settings', 'AdminController::appSettings');

$routes->get('/user-withdraw-requests', 'AdminController::userWithdrawRequests');

$routes->get('/users/(:any)', 'AdminController::userDetails/$1');
$routes->get('/users', 'AdminController::users');

$routes->get('/result-chart', 'AdminController::resultChart');

$routes->get('/games/result-chart/(:any)', 'AdminController::gameResultChart/$1');
$routes->get('/games/anounce-result/(:any)', 'AdminController::gameAnnounceResult/$1');
$routes->get('/games/add', 'AdminController::gameAdd');
$routes->get('/games', 'AdminController::games');

$routes->get('/login', 'AuthController::login');

$routes->get('/', 'WebController::index');
