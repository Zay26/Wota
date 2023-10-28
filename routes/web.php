<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TankController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\UserController;
use Symfony\Component\HttpKernel\DataCollector\DataCollector;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/dashboard', [UserController::class,'dashboardData'])->name('dashboard');
Route::get('/tankVisuals/{id}',[UserController::class, 'data'])->name('tankVisuals');


Route::get('/home', function () {
    return view('welcome');
})->name('home');

//User 
Route::get('/users', [UserController::class, "index"])->name('users');
Route::get('/master',[UserController::class, "index2"])->name('master');
Route::get('/userreg', [UserController::class,'userReg'])->name('userReg');
Route::get('/adminview', [UserController::class,'adminReg'])->name('adminview');
Route::post('/formReg', [UserController::class, "create"])->name('formreg');
Route::get('/userEdit/{id}',[UserController::class,'edit'])->name('userEdit');
Route::post('/userEdit/{id}',[UserController::class,'updateUser'])->name('Edituser');
Route::get('/UserDelete/{id}',[UserController::class, 'destroy'])->name('userDelete');

Route::post('/formLogin', [AuthController::class, "FormLogin"])->name('formLogin');
Route::post('/adminreg',[AuthController::class,'registerAdmin'])->name('adminreg');

Route::get('/formLogout', [AuthController::class, "logout"])->name('logout');


//Tank
Route::get('/tank',[TankController::class , 'index'] )->name('tank');
Route::post('/tankreg',[TankController::class , 'store'] )->name('tankReg');
Route::get('/one',[UserController::class , 'show'] )->name('one');
Route::get('/tankView',[TankController::class , 'form'])->name('tankForm');

Route::get('/tankEdit/{id}',[TankController::class, 'edit'])->name('editTank');
Route::post('/tankEdit/{id}',[TankController::class, 'update'])->name('tankEdit');
Route::get('/tankDelete/{id}',[TankController::class, 'destroy'])->name('tankDelete');


// Route::get('/dataHere', [DataController::class,'usedWaterDaily'])->name('data');
Route::get('/newData', [DataController::class, 'getWeeklyDatasum'])->name('newData');


//Data to the Api
Route::get('/dayData',[DataController::class,'getWeeklyData'])->name('dayData');
Route::get('/nowData',[DataController::class,'getWeeklyData'])->name('nowData');
Route::get('/data1',[DataController::class,'getMonthlyData'])->name('data');

//reports
Route::get('/report',[DataController::class,'data2'])->name('reportData');
Route::get('/downloadReport',[DataController::class,'downloadReport'])->name('downloadReport');
Route::get('/newR/{id}', [DataController::class, 'dataParser'])->name('newR');


///data
// Route::post('/getmoredata',[DataController::class,'fetchdatahere'])->name('fetchdata');
// Route::get('/data',[DataController::class,'fetchdatahere']);
Route::post('/mmdata',[DataController::class,'fetchdatahere']);

Route::get("/tester",[Datacontroller::class,'fetcher']);
// routes/web.php
Route::post('/data', 'WaterLevelController@store');
use App\Http\Controllers\FirebaseController;

Route::get('/realtime-database', [FirebaseController::class, 'readRealtimeDatabase']);


