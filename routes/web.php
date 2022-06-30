<?php

use App\Http\Controllers\ConsultationController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;

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

// home
Route::controller(HomeController::class)
    ->group(function () {
        Route::get('/', 'index')->name('home');
        Route::get('/home', 'index')->name('home');
        Route::get('/article', 'article')->name('article');
        Route::get('/video', 'video')->name('video');
    });

// consultation
Route::get('/consultation/psychologists', [ConsultationController::class, 'index'])->name('consultation');
Route::get('/consultation/psychologists/{psychologist}', [ConsultationController::class, 'show']);


Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
