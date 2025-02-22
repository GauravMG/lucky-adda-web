<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/user-withdraw-requests', 'Admin::userWithdrawRequests');
$routes->get('/game/anounce-result/(:any)', 'Admin::gameAnnounceResult/$1');
$routes->get('/games', 'Admin::games');
$routes->get('/', 'Admin::index');

$routes->get('/login', 'AuthController::login');
