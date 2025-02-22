<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// $routes->post('/lead/(:any)/update-payments', 'DashboardController::updatePayments/$1');
// $routes->get('/lead/(:any)/fetch-payments', 'DashboardController::fetchPayments/$1');

// $routes->post('/lead/(:any)/create-account', 'DashboardController::createAccount/$1');
// $routes->get('/lead/(:any)/fetch-accounts', 'DashboardController::fetchAccounts/$1');

// $routes->post('/lead/(:any)/upload-document', 'DashboardController::uploadDocument/$1');
// $routes->get('/lead/(:any)/fetch-documents', 'DashboardController::fetchDocuments/$1');

// $routes->post('/lead/(:any)/update-details', 'DashboardController::updateDetails/$1');
// $routes->get('/lead/(:any)/fetch-details', 'DashboardController::fetchDetails/$1');

// $routes->get('/lead/(:any)', 'DashboardController::leadSingle/$1');

// $routes->post('/change-branch', 'DashboardController::changeBranch');

// $routes->get('/clients', 'DashboardController::clients');
// $routes->get('/dashboard', 'DashboardController::index');
$routes->get('/admin/user-withdraw-requests', 'Admin::userWithdrawRequests');
$routes->get('/admin/games', 'Admin::games');
$routes->get('/admin/', 'Admin::index');

// $routes->get('/logout', 'AuthController::logout');
// $routes->post('/attempt-login', 'AuthController::attemptLogin');
$routes->get('/admin/login', 'AuthController::login');

// $routes->get('/ghl-api/fetch-pipelines', 'GHLAPIController::fetchPipelines');

