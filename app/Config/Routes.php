<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/app-settings', 'Admin::appSettings');

$routes->get('/user-withdraw-requests', 'Admin::userWithdrawRequests');

$routes->get('/users/(:any)', 'Admin::userDetails/$1');
$routes->get('/users', 'Admin::users');

$routes->get('/result-chart', 'Admin::resultChart');

$routes->get('/games/result-chart/(:any)', 'Admin::gameResultChart/$1');
$routes->get('/games/anounce-result/(:any)', 'Admin::gameAnnounceResult/$1');
$routes->get('/games/add', 'Admin::gameAdd');
$routes->get('/games', 'Admin::games');

$routes->get('/', 'Admin::index');

$routes->get('/login', 'AuthController::login');
