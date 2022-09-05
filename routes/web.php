<?php

use App\Models\User;
use Auth\LoginController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
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

/* Route::get('/', function () {
    return view('welcome');
});
 */
Auth::routes();
Route::get('/', [MainController::class, 'homePage'])->name('accueil');
Route::get('/auth/github', [GithubController::class, 'auth'])->name('github.auth');
Route::get('/auth/github/redirect', [GithubController::class, 'redirect'])->name('github.redirect');
Route::get('/auth/google', [GoogleController::class, 'auth'])->name('google.auth');
Route::get('/auth/google/redirect', [GoogleController::class, 'redirect'])->name('google.redirect');
Route::get('/finish_registeration/{user}', function ($user) { 
    $userinfos = User::where('id', $user)->get();
    return view('auth.oAuthRegister', compact('userinfos')); })->name('finish.registeration');
Route::post('oAuth/register/', [oAuthController::class, 'updateOAuthUser'])->name('oAuth.register');

