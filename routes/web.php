<?php

use Illuminate\Http\Request;
use App\Http\Controllers\MyWelcomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ReporController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Spatie\WelcomeNotification\WelcomesNewUsers;
use App\Http\Controllers\API\Ext\PowerBIController;


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


//  Username:   bereankibet@gmail.com
//  Password:   sysadmin
 

Route::get('/test-ldap', [PageController::class, 'checkLdapConnection']);
Route::get('/welcome/dashboard', function (Request $request) {
    return view('pages.dashboard.index');
});

Route::get('/welcome/dashboard2', function (Request $request) {
    return view('pages.account.index');
});

Route::get('/best', function (Request $request) {
    return view('layouts.index');
});

Route::get('/start', function (Request $request) {
    return view('pages.projects.index');
    // return view('pages.index');
});

Route::group(['middleware' => ['web', WelcomesNewUsers::class]], function () {

    Route::get('welcome/{user}', [MyWelcomeController::class, 'showWelcomeForm'])->name('welcome');
    Route::post('welcome/{user}', [MyWelcomeController::class, 'savePassword']);
});

Auth::routes(['verify' => true]);
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['auth']], function () {

     
    Route::get('dashboards/api/dashboards/risk', [PowerBIController::class, 'getRiskDashboard']);
    Route::get('dashboards/api/dashboards/erm', [PowerBIController::class, 'getErmDashboard']);

    Route::get('/saveToSession',[PageController::class, 'saveToSession'])->name('saveToSession');

    // Route::get('/', [PageController::class, 'getDashboard']);
    Route::get('/filedownload/{id}', [PageController::class, 'fileDownload']);
    Route::get('/filedownload_wip/{id}', [PageController::class, 'fileDownloadwIP']);
    Route::get('/attachments/{id}', [PageController::class, 'attachmentDownload']);
    Route::get('/export/kri/register', [ReporController::class, 'exportKRIRegister']);
    Route::get('/export/erm/register', [ReporController::class, 'exportERMRegister']);
    Route::get('/export/incident/register', [ReporController::class, 'exportIncidentRegister']);
    Route::get('/export/action/register', [ReporController::class, 'exportActionRegister']);
    Route::get('/qms_register_export', [ReporController::class, 'exportQmsRegister']);
    Route::get('/export/crm/register', [ReporController::class, 'exportCRMRegister']);
    Route::get('/export/strategic/register', [ReporController::class, 'exportStrategicRegister']);

    Route::get('/downloadexcel', [ReporController::class, 'exportExcel']);

    // Entry
    Route::get('/', [PageController::class, 'mainMaster']);
    Route::any('{query}', [PageController::class, 'mainMaster'])
        ->where('query', '.*');
});

    