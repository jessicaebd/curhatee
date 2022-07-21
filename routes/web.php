<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HospitalController;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\PsychologistController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ChatController;

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

// languange
Route::get('/lang/{locale}', function ($locale) {
    session()->put('locale', $locale);
    return redirect()->back();
});

// auth
Auth::routes();

Route::controller(PsychologistController::class)
    ->prefix('psychologist')
    ->group(function () {
        Route::get('/login', 'login')->name('psychologist_login');
        Route::post('/login', 'authenticate');
    });

Route::controller(PsychologistController::class)
    ->prefix('psychologist')
    ->middleware('auth:webpsychologist')
    ->group(function () {
        Route::get('/logout', 'logout');
        Route::get('/', 'psychologist_index')->name('psychologist_dashboard');
        Route::get('/transactions/{transaction}', 'psychologist_show')->name('psychologist_show');
        Route::put('/transactions/accept/{transaction}', 'psychologist_update_accept');
        Route::put('/transactions/reject/{transaction}', 'psychologist_update_reject');
        Route::post('/transactions/end/{transaction}', 'psychologist_end')->name('psychologist_end');
    });

// home
Route::controller(HomeController::class)
    ->group(function () {
        Route::get('/', 'index')->name('home');
    });

// consultation
Route::prefix('/consultation')
    ->controller(ConsultationController::class)
    ->group(function () {
        Route::get('/psychologists', 'index');
        Route::get('/psychologists/{psychologist}', 'show')->name('psychologist_detail');
        Route::post('/psychologists/{psychologist}', 'store')->middleware('auth');
        Route::get('/', 'my_index')->name('my_consultation')->middleware('auth');
        Route::get('/{transaction}', 'my_show')->middleware('auth');
        Route::post('/{transaction}', 'my_store')->middleware('auth');
        Route::put('/{transaction}', 'update')->middleware('auth');
        Route::post('/review/{transaction}', 'review')->middleware('auth');
    });

// chat for user
Route::prefix('/chat-psychologist')
    ->controller(ChatController::class)
    ->middleware('auth')
    ->group(function () {
        Route::get('/{transaction}', 'index')->name('chat_page_user');
        Route::post('/{transaction}', 'store')->name('store_chat_user');
        Route::get('/{transaction}/message', 'showMessage')->name('show_message');
    });

// chat for psychologist
Route::prefix('/chat-user')
    ->controller(ChatController::class)
    ->middleware('auth:webpsychologist')
    ->group(function () {
        Route::get('/{transaction}', 'index')->name('chat_page_psychologist');
        Route::post('/{transaction}', 'store')->name('store_chat_psychologist');
        Route::get('/{transaction}/message', 'showMessage')->name('show_message');
    });

// forum without middleware
Route::prefix('/forum')
    ->controller(ForumController::class)
    ->group(function () {
        Route::get('/', 'index')->name('forum_page');
        Route::get('/{forum}', 'show')->name('show_detail_forum');
    });

// forum for user
Route::prefix('/forum-user')
    ->controller(ForumController::class)
    ->middleware('auth')
    ->group(function () {
        Route::get('/add', 'create')->name('create_forum_user');
        Route::post('/add', 'store')->name('store_forum_user');
        Route::post('/like/forum/{forum}', 'likeForum')->name('like_forum_user');
        Route::post('/like/reply-forum/{reply_forum_user}', 'likeReplyForum')->name('like_reply_forum_user');
        Route::post('/{forum}', 'storeReply')->name('store_reply_forum_user');
    });

// forum for psychologist
Route::prefix('/forum-psychologist')
    ->controller(ForumController::class)
    ->middleware('auth:webpsychologist')
    ->group(function () {
        Route::get('/add', 'create')->name('create_forum_psychologist');
        Route::post('/add', 'store')->name('store_forum_psychologist');
        Route::post('/like/forum/{forum}', 'likeForum')->name('like_forum_psychologist');
        Route::post('/like/reply-forum/{reply_forum_psychologist}', 'likeReplyForum')->name('like_reply_forum_psychologist');
        Route::post('/{forum}', 'storeReply')->name('store_reply_forum_psychologist');
    });

// forum for admin
Route::prefix('/forum-admin')
    ->controller(ForumController::class)
    ->middleware('auth:webpsychologist')
    ->group(function () {
        Route::delete('/delete/{forum}', 'deletForum')->name('delete_forum');
        Route::delete('/delete/{reply_forum}', 'deleteReplyForum')->name('delete_reply_forum');
    });

// review
Route::prefix('/review')
    ->controller(ReviewController::class)
    ->group(function () {
        // Route::get('/{psychologist}', 'show')->name('show_review');
        Route::post('/{psychologist}', 'store')->name('store_review')->middleware('auth');
    });

// article
Route::prefix('/article')
    ->controller(ArticleController::class)
    ->group(function () {
        Route::get('/', 'index')->name('article_page');
        Route::get('/{article}', 'show')->name('show_detail_article');
    });

// profiles
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');

// admins
Route::prefix('/admin')
    ->middleware('admin')
    ->group(function () {

        Route::controller(AdminController::class)
            ->group(function () {
                Route::get('/article', 'article')->name('manage_article');
                Route::get('/psychologist', 'psychologist')->name('manage_psychologist');
                Route::get('/hospital', 'hospital')->name('manage_hospital');
            });

        Route::prefix('/article')
            ->controller(ArticleController::class)
            ->group(function () {
                Route::get('/add', 'create')->name('add_article');
                Route::post('/add', 'store')->name('store_article');
                Route::get('/edit/{article}', 'edit')->name('edit_article');
                Route::post('/edit/{article}', 'update')->name('update_article');
                Route::delete('/delete/{article}', 'destroy')->name('delete_article');
            });

        Route::prefix('/psychologist')
            ->controller(PsychologistController::class)
            ->group(function () {
                Route::get('/add', 'create')->name('add_psychologist');
                Route::post('/add', 'store')->name('store_psychologist');
                Route::get('/edit/{psychologist}', 'edit')->name('edit_psychologist');
                Route::post('/edit/{psychologist}', 'update')->name('update_psychologist');
                Route::delete('/delete/{psychologist}', 'destroy')->name('delete_psychologist');
            });

        Route::prefix('/hospital')
            ->controller(HospitalController::class)
            ->group(function () {
                Route::get('/add', 'create')->name('add_hospital');
                Route::post('/add', 'store')->name('store_hospital');
                Route::get('/edit/{hospital}', 'edit')->name('edit_hospital');
                Route::post('/edit/{hospital}', 'update')->name('update_hospital');
                Route::delete('/delete/{hospital}', 'destroy')->name('delete_hospital');
            });
    });
