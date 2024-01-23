<?php

use App\Controllers\PatientController;
use App\Controllers\UserController;
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

//service routes
$routes->get('services','ServiceController::index');
$routes->post('create_service','ServiceController::store');

//patient
$routes->get('patients','PatientController::loadRecord');
$routes->get('loadRecord','PatientController::loadRecord');
$routes->get('create_patient','PatientController::index');
$routes->post('store_patient','PatientController::store');
$routes->get('patient','PatientController::loadRecord');
$routes->get('nextpage/(:segment)','PatientController::profile/$1');
$routes->get('editpage/(:segment)','PatientController::editpage/$1');
$routes->post('update_patient','PatientController::update_patient');
// $routes->get('profile','PatientController::pro');
$routes->get('vital_signs/(:segment)','PatientController::update/$1');
$routes->get('transfer/(:segment)','PatientController::getDepartments/$1');


//user Auth
$routes->get('/', 'Home::index');
$routes->get('login', 'Login::index');
$routes->post('login/auth','Login::auth');
$routes->get('user/create','UserController::index');
$routes->post('store_staff','UserController::create');
$routes->get('staffs','UserController::all_staffs');
$routes->get('updateUser/(:segment)','UserController::update_user/$1');
$routes->post('update_staff','UserController::update_staff');


$routes->post('user/departiments', [UserController::class,'getDepartments']);
$routes->post('user/name/(:segment)', [UserController::class,'getUsersByDepartment']);


//vital signs
$routes->post('store_vital','VitalController::index');
$routes->get('signs/(:segment)','VitalController::preview/$1');
$routes->post('store_signs','VitalController::index');


// Transfer
$routes->post('transfer','TransferController::transfer');

// service payment

$routes->post('sarvicepay','HudumaController::index');

// PATIENT PROFILE
$routes->get('complain/(:segment)','ComplainController::index/$1');
$routes->post('store_complain','ComplainController::store');
$routes->get('hpi/(:segment)','HistoryController::index/$1');
$routes->post('store_history','HistoryController::store');
$routes->get('review/(:segment)','ReviewController::index/$1');
$routes->post('storeReview','ReviewController::store');

