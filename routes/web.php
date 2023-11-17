
<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

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

Route::get('/clear', function () {
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


Route::get('/{vue_capture?}', function () {
    return view('home');
});
