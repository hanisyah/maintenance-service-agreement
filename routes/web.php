<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//get
Route::get('/')->name('dashboard.dashboard')->uses('DashboardController@index');
Route::resource('/dashboard','DashboardController');
Route::resource('/user','UserController');


//plant
Route::get('/plant','PlantController@index');
Route::get('/plant/tambah','PlantController@tambah');
Route::post('/plant/store','PlantController@store');
Route::get('/plant/edit/{id_plant}','PlantController@edit');
Route::post('/plant/update/{id_plant}','PlantController@update');
Route::get('/plant/hapus/{id_plant}','PlantController@hapus');

//lokasi
Route::get('/lokasi','LokasiController@index');
Route::get('/lokasi/tambah','LokasiController@tambah');
Route::post('/lokasi/store','LokasiController@store');
Route::get('/lokasi/edit/{id_lokasi}','LokasiController@edit');
Route::post('/lokasi/update/{id_lokasi}','LokasiController@update');
Route::post('/lokasi/hapus','LokasiController@hapus');
Route::get('/lokasi/cari','LokasiController@cari');
Route::get('cari','LokasiController@search');


//measurement
Route::resource('/measurement', 'MeasurementController');

//company
Route::resource('/company','CompanyController');

//problem class
Route::resource('/problem_class','ProblemClassController');

//employee
Route::resource('/employee','EmployeeController');

//cause class
Route::resource('/cause_class','CauseClassController');

//tool
Route::resource('/tool','ToolController');

//component & consumable
Route::resource('/component-consumable','ComponentController');

//task
Route::resource('/task','TaskController');

//maintenance
Route::resource('/maintenance','MaintenanceController');

//project
Route::resource('/project','ProjectController');
Route::get('/getData/{idProject}','ProjectController@getData')->name('getData');

//pic project
Route::resource('/pic','PicController');

//pic project
Route::resource('/train-set','TrainsetController');

//Location -> Employee
Route::resource('/locemployee','LocemployeeController');

//Location -> Stock -> Tool
Route::resource('/stocktool','StockToolController');
Route::get('/stocktool/detail/{id_stocktool}','StockToolController@detail');

//Location -> Stock -> Material
Route::resource('/stockmaterial','StockMaterialController');

//Location -> Calibration Tool
Route::resource('/calibration','CalibrationController');

//Project -> Material Project
Route::resource('/materialproject','MaterialprojectController');
Route::post('/materialproject', 'MaterialprojectController@store')
    ->name('Materialproject.store');

//Transaction -> Stock Catalog -> Tool
Route::resource('/catalogtool','CatalogtoolController');

//Transaction -> Car Material 
Route::resource('/carmaterial','CarMaterialController');
//Transaction -> Stock Catalog -> Material
Route::resource('/catalogmaterial','CatalogmaterialController');

//Transaction -> Transfer -> Tool
Route::resource('/transfertool','TransfertoolController');

//Transaction -> Transfer -> Material
Route::resource('/transfermaterial','TransfermaterialController');

//Configuration -> Setting
Route::resource('/setting','SettingController');

//car Material
Route::resource('/carmaterial','CarMaterialController');

//Schedule_plan
Route::resource('/schedule_plan','SchedulePlanController');

//Schedule_realization
Route::resource('/schedule_realization','ScheduleRealizationController');

//Transaction -> Schedule Assign
Route::resource('/scheduleassign','ScheduleassignController'); 

//Transaction -> Bad Actor
Route::resource('/bad','BadController'); 

//report => train availability
Route::resource('/train_availability','TrainAvailabilityController');

//report -> train reliability
Route::resource('/train_reliability','TrainReliabilityController');

//Report -> OVRB
Route::resource('/ovrb','OvrbController'); 

//Report -> Material Log
Route::resource('/materiallog','MateriallogController'); 