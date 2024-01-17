<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
//Setting Routes
$routes->get('General_setting','Setting::index');
$routes->post('create_setting','Setting::create');

//Payment ROutes
$routes->get('payment_method','Payment::index');
$routes->post('create_payment','Payment::store');

//categories 
$routes->get('tests_settings','LabtestController::index');
$routes->post('create_test','LabtestController::store');
// $routes->get('test_setting/(:segment)','LabtestController:edit/$1');
