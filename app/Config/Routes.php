<?php

use App\Controllers\ComplainController;
use App\Controllers\HistoryController;
use App\Controllers\PatientController;
use App\Controllers\UserController;
use App\Controllers\VitalController;
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
//labtest
$routes->get('/edit/(:segment)','Payment::edit/$1');

//labtest

//payment
$routes->get('update_payment/(:segment)','Payment::indexes/$1');
$routes->post('update_payment','Payment::update');
//payment

//categories 
$routes->get('tests_settings','LabtestController::index');
$routes->post('create_test','LabtestController::update');
$routes->post('create_category','LabtestController::store');
$routes->get('update_category/(:segment)','LabtestController::Update/$1');
$routes->post('update_categor','LabtestController::insert_update');

//service routes
$routes->get('services','ServiceController::index');
$routes->post('create_service','ServiceController::store');

//patient
// // $routes->get('patients','PatientController::loadRecord');
// $routes->get('loadRecord','PatientController::loadRecord');
// // $routes->get('create_patient','PatientController::index');
// $routes->post('store_patient','PatientController::store');
// // $routes->get('nextpage/(:segment)','PatientController::profile/$1');
// $routes->get('editpage/(:segment)','PatientController::editpage/$1');
// $routes->post('update_patient','PatientController::update_patient');
// // $routes->get('profile','PatientController::pro');
// $routes->get('vital_signs/(:segment)','PatientController::update/$1');
// $routes->get('transfer/(:segment)','PatientController::getDepartments/$1');


$routes->group('patients', static function ($routes) {
    $routes->get('/','PatientController::loadRecord');
    $routes->get('(:num)','PatientController::profile/$1');

    $routes->get('(:num)/signs', [VitalController::class, 'index']);
    $routes->post('(:num)/signs', [VitalController::class, 'store']);

    $routes->get('(:num)/complains', [ComplainController::class, 'index']);
    $routes->post('(:num)/complains', [ComplainController::class, 'store']);

    $routes->get('(:num)/hpis', [HistoryController::class, 'index']);
    $routes->post('(:num)/hpis', [HistoryController::class, 'store']);

    $routes->post('(:num)/complains', [ComplainController::class, 'store']);
    $routes->get('show','PatientController::show');
    $routes->get('edit/(:segment)','PatientController::editpage/$1');
    $routes->post('update',[PatientController::class, 'update_patient']);
    $routes->post('store_patient',[PatientController::class, 'store']);
});


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
$routes->post('store_signs','VitalController::insert');


// Transfer
$routes->get('transfers/(:segment)','TransferController::index/$id');

// service payment

$routes->post('sarvicepay','HudumaController::index');

// PATIENT PROFILE
$routes->get('complain/(:segment)','ComplainController::index/$1');
$routes->post('store_complain','ComplainController::store');
$routes->get('hpi/(:segment)','HistoryController::index/$1');
$routes->post('store_history','HistoryController::store');
$routes->get('review/(:segment)','ReviewController::index/$1');
$routes->post('storeReview','ReviewController::store');
$routes->get('past-medical/(:segment)','PastmedicalController::index/$1');
$routes->post('store','PastmedicalController::store');
$routes->get('family/(:segment)','FamilyhistorylController::index/$1');
$routes->post('family-store','FamilyhistorylController::store');
$routes->get('examination/(:segment)','ExaminationController::index/$1');
$routes->post('examination-store','ExaminationController::store');
$routes->get('diagnosis/(:segment)','DiagnosisController::index/$1');
$routes->post('store_diagnosis','DiagnosisController::store');
$routes->post('invest','InvestigationController::store');

