<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use Doctrine\DBAL\Driver\Middleware;

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
    return view('index');
});

// Route::resource('/admin/users', UserController::class);


Route::get('/logout', 'Laravel\Fortify\Http\Controllers\AuthenticatedSessionController@destroy');

Route::prefix('admin')->middleware('auth')->name('admin.')->group(function(){
    Route::resource('/users', UserController::class);
});

