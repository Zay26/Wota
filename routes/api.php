<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\ApiTankController;
use App\Http\Controllers\ApiDataController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/auth/register', [AuthController::class, "register"]);

Route::post('/auth/login', [AuthController::class, "login"]);
Route::get('/auth/logout', [AuthController::class, "Apilogout"]);


//Tank Api
Route::get('/tank',[ApiTankController::class , 'index'] )->name('tank');
Route::get('/tankUser/{id}',[ApiTankController::class , 'tankUser'] )->name('userTank');
Route::post('/tankView',[ApiTankController::class , 'form'])->name('tankForm');
Route::post('/regTank',[ApiTankController::class , 'store_api'] )->name('regTank');
Route::post('/tankreg',[TankController::class , 'store'] )->name('tankreg');

//DATA API
Route::get('/weeklyData/{id}', [ApiDataController::class, 'getWeeklyData'])->name('weeklyData');
Route::get('/MonthlyData/{id}', [ApiDataController::class, 'getMonthlyData'])->name('monthlyData');
Route::get('/DailyData/{id}', [ApiDataController::class, 'usedWaterDaily'])->name('dailyData');
Route::get('/DailyListData/{id}', [ApiDataController::class, 'usedWaterDailyList'])->name('dailyListData');
Route::get('/endevor/{id}', [ApiDataController::class, 'endevor'])->name('endData');



//getWeeklyData
//Testing 
 