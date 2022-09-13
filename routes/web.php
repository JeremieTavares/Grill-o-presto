<?php

use App\Models\User;
use Auth\LoginController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\Auth\oAuthController;
use App\Http\Controllers\Auth\GithubController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\Auth\RegisterController;

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



Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/menu/{menu?}', [MenuController::class, 'index'])->name('menu');
Route::get('/repas/{repas}/{addCart?}', [MenuController::class, 'single'])->name('repas');

Auth::routes();
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/finish_registeration/{user}', [oAuthController::class, 'returnViewToCompleteRegisteration'])->middleware('auth')->name('finish.registeration');


Route::controller(GoogleController::class)->name('google.')->group(function () {
    Route::get('/auth/google', 'auth')->name('auth');
    Route::get('/auth/google/redirect', 'redirect')->name('redirect');
    Route::get('google/finish_registeration/{user}', 'returnViewToCompleteRegisteration')->middleware('auth')->name('finish.registeration');
});


Route::controller(GithubController::class)->name('github.')->group(function () {
    Route::get('/auth/github', 'auth')->name('auth');
    Route::get('/auth/github/redirect', 'redirect')->name('redirect');
    Route::get('github/finish_registeration/{user}', 'returnViewToCompleteRegisteration')->middleware('auth')->name('finish.registeration');
});


Route::controller(oAuthController::class)->name('oAuth.')->prefix('oAuth/')->group(function () {
    Route::post('register/', 'updateOAuthUser')->name('register');
});
 
Route::get('/panier', [MainController::class, 'panier'])->name('commande');


