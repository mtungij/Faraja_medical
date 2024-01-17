<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('General_setting','Setting::index');
$routes->post('create_setting','Setting::create');
