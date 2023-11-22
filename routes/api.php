<?php

use App\Http\Controllers\CrimeController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

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




Route::post('/crime', [CrimeController::class, 'addCrime']);

Route::get('/crimes', [CrimeController::class, 'getCrimes']);

Route::get('/crimes/{crime}', [CrimeController::class, 'getCrime']);


Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    Artisan::call('view:clear');
    Artisan::call('config:cache');
    Artisan::call('optimize:clear');
    Artisan::call('storage:link');
    echo "Config cleared<br>";

});

Route::get('/symlink', function () {
    Artisan::call('storage:link');
    echo "Linked<br>";
});
