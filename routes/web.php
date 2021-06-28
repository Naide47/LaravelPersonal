<?php

use App\Http\Controllers\SiteController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

// Route::group(['middleware' => ['auth']], function () {
//     Route::get('/', 'SiteController@home')->name('home');
// });

// Route::get('/login', ' SiteController@login')->name('login');
// Route::post('/login', 'SiteController@loginPost');
// Route::post('/login', 'SiteController@logout');

Route::group(['middleware'=>['auth']], function(){
    Route::get('/mision', 'SiteController@mision');
    Route::get('/vision', 'SiteController@vision');
    Route::resource('users', 'UserController');
});


Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');
