<?php

use App\Http\Controllers\ConsultationController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Auth::routes();

Route::controller(HomeController::class)
    ->group(function () {
        Route::get('/', 'index')->name('home');
        Route::get('/article', 'article')->name('article');
        Route::get('/video', 'video')->name('video');
    });

<<<<<<< HEAD

Route::get('/consultation/psychologists', [ConsultationController::class, 'index'])->name('consultation');
=======
Route::get('/consultation/psychologists', function () {
    return view('consultation.index');
});

Route::get('/profile', function () {
    return view('profile');
});
>>>>>>> 6483c0655f2ddd2db0dc3a705c9f339d4311c04f
