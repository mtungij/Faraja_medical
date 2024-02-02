<?php

use App\Controllers\AppointmentController;
use App\Controllers\ComplainController;
use App\Controllers\DiagnosisController;
use App\Controllers\ExaminationController;
use App\Controllers\FamilyhistorylController;
use App\Controllers\HistoryController;
use App\Controllers\InvestigationController;
use App\Controllers\InvoiceController;
use App\Controllers\PastmedicalController;
use App\Controllers\PatientController;
use App\Controllers\ReviewController;
use App\Controllers\SellController;
use App\Controllers\TransferController;
use App\Controllers\TreatmentController;
use App\Controllers\UserController;
use App\Controllers\VitalController;
use App\Models\InvoiceModel;
use App\Models\Reviews;
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
$routes->get('patients','PatientController::loadRecord');
$routes->get('loadRecord','PatientController::loadRecord');
$routes->get('create_patient','PatientController::index');
$routes->post('store_patient','PatientController::store');
$routes->get('Newpatients','PatientController::new');
$routes->get('all_patients','PatientController::all_patients');
$routes->get('nextpage/(:segment)','PatientController::profile/$1');
$routes->get('editpage/(:segment)','PatientController::editpage/$1');
$routes->post('update_patient','PatientController::update_patient');
$routes->get('today/appointments','AppointmentController::todayappointment');
$routes->get('weekly/appointments','AppointmentController::weeklyappointment');
$routes->get('vital_signs/(:segment)','PatientController::update/$1');


$routes->group('patients', static function ($routes) {
    $routes->get('/','PatientController::loadRecord');
    $routes->get('(:num)','PatientController::profile/$1');

    $routes->get('(:num)/signs', [VitalController::class, 'index']);
    $routes->post('(:num)/signs', [VitalController::class, 'store']);

    $routes->get('(:num)/complains', [ComplainController::class, 'index']);
    $routes->post('(:num)/complains', [ComplainController::class, 'store']);

    $routes->get('(:num)/hpis', [HistoryController::class, 'index']);
    $routes->post('(:num)/hpis', [HistoryController::class, 'store']);

    $routes->get('(:num)/rvs', [ReviewController::class, 'index']);
    $routes->post('(:num)/rvs', [ReviewController::class, 'store']);

    $routes->get('(:num)/pmhs', [PastmedicalController::class, 'index']);
    $routes->post('(:num)/pmhs', [PastmedicalController::class, 'store']);

    $routes->get('(:num)/fshs', [FamilyhistorylController::class, 'index']);
    $routes->post('(:num)/fshs', [FamilyhistorylController::class, 'store']);

    $routes->get('(:num)/examinations', [ExaminationController::class, 'index']);
    $routes->post('(:num)/examinations', [ExaminationController::class, 'store']);

    $routes->get('(:num)/diagnosis', [DiagnosisController::class, 'index']);
    $routes->post('(:num)/diagnosis', [DiagnosisController::class, 'store']);

    $routes->get('(:num)/investigations', [InvestigationController::class, 'index']);
    $routes->post('(:num)/investigations', [InvestigationController::class, 'store']);
    $routes->get('(:num)/investigations/(:num)/edit', [InvestigationController::class, 'edit']);
    $routes->patch('(:num)/investigations/(:num)/update', [InvestigationController::class, 'update']);

    $routes->get('(:num)/treatments', [TreatmentController::class, 'index']);
    $routes->post('(:num)/treatments', [TreatmentController::class, 'store']);

    $routes->get('(:num)/appointments', [AppointmentController::class, 'index']);
    $routes->post('(:num)/appointments', [AppointmentController::class, 'store']);


    $routes->get('(:num)/invoice', [InvoiceController::class, 'index']);
    $routes->patch('(:num)/(:num)/invoice_status', [InvoiceController::class, 'changeStatus']);
    

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



//vital signs
$routes->post('store_vital','VitalController::index');
$routes->get('signs/(:segment)','VitalController::preview/$1');
$routes->post('store_signs','VitalController::insert');


// Transfer
$routes->get('transfer/departments', [TransferController::class, 'get_departments']);
$routes->get('transfer/staffs/(:segment)', [TransferController::class, 'getStaffByDepartment']);
$routes->post('transfer', [TransferController::class, 'store']);

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


$routes->get('drugs','DrugController::index');
$routes->post('drugscreate','DrugController::store');
// $routes->get('sell','DrugController::sell');
$routes->get('search/patient','SellController::search');

$routes->get('sell',[SellController::class, 'index']);
$routes->post('sell',[SellController::class, 'store']);
$routes->patch('sell/update',[SellController::class, 'update']);
$routes->delete('sell/remove',[SellController::class, 'remove']);
$routes->post('sell/checkout',[SellController::class, 'checkout']);



$routes->presenter('surgical',['controller' => 'SurgicalController']);


// PRINTING REPORTS
$routes->get('print_medicine','PrintController::medicine');


