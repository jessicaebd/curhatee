<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArticleController;
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
Route::get('/consultation/psychologists/{psychologist}/{date}', [ConsultationController::class, 'detail']);


Route::get('/profile', [ProfileController::class, 'index'])->name('profile');


Route::prefix('admin/')
    ->middleware('admin')
    ->group(function () {
        // Route::get('/admin', 'index')->name('admin');

        // Admin Page
        Route::controller(AdminController::class)
            ->group(function () {
                Route::get('/article', 'article')->name('manage_article');
            });

        // Article CRUD
        Route::prefix('admin/article')
            ->controller(ArticleController::class)
            ->group(function () {
                Route::get('/add', 'create')->name('add_article');
                Route::post('/add', 'store')->name('store_article');
                Route::get('/edit/{article}', 'edit')->name('edit_article');
                Route::post('/edit/{article}', 'update')->name('update_article');
                Route::delete('/delete/{article}', 'destroy')->name('delete_article');
            });
    });
