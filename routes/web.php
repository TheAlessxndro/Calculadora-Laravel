<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CalculatorController;
use Carbon\Carbon;

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

Route::get('/', function () {
    return view('welcome');
});

//  la hora actual
if (Carbon::now() >= Carbon::parse('2024-02-27 16:00')) {
    // Si la hora actual es después o igual a las 16:00
    Route::get('/calculator', [CalculatorController::class, 'index']);
    Route::post('/calculate', [CalculatorController::class, 'calculate']);
} else {
    // Si la hora actual es antes de las 16:00
    Route::get('/calculator', function () {
        return 'No se puede abrir';
    });
    Route::post('/calculate', function () {
        return 'No se puede abrir';
    });
}
