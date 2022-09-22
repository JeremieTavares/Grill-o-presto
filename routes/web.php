<?php

use App\Models\User;
use Auth\LoginController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\Auth\oAuthController;
use App\Http\Controllers\CreditcardController;
use App\Http\Controllers\Auth\GithubController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\gestionAdmin\GestionAdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\MenuAdmin;
use App\Http\Controllers\Admin\gestionClient\GestionClientController;
use App\Http\Controllers\Admin\gestionTicket\GestionTicketController;

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
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/menu/{menu?}', [MenuController::class, 'index'])->name('menu');
Route::get('/repas/{repas}/{addCart?}', [MenuController::class, 'single'])->name('meal');
Route::get('/panier/{delete?}', [CartController::class, 'index'])->name('cart');
Route::get('/checkout', [CartController::class, 'preCheckout'])->name('preCheckout.log');
Route::post('/checkout', [CartController::class, 'preCheckoutGuest'])->name('preCheckout.guest');

Route::get('/plat', [HomeController::class, 'platSelectionne'])->name('plat');

Route::get('/faq', [HomeController::class, 'indexFaq'])->name('faq');



// ==========================================================================================================================================================
// ****METTRE EN RESOURCES PLUS TARD****
// USER ACCOUNT INFORMATIONS
Route::get('user/account/informations/edit/{id}', [UserController::class, 'edit'])->middleware(['auth', 'validate-user-infos', 'prevent-back-history'])->name('user.edit.info');
Route::patch('user/account/informations/update/{id}', [UserController::class, 'update'])->middleware(['auth', 'validate-user-infos', 'prevent-back-history'])->name('user.update.info');
Route::delete('user/account/destroy/{id}', [UserController::class, 'destroy'])->middleware(['auth', 'validate-user-infos', 'prevent-back-history'])->name('user.account.destroy');
// ==========================================================================================================================================================


// ==========================================================================================================================================================
// ****METTRE EN RESOURCES PLUS TARD****
// USER ACCOUNT ORDERS
Route::get('user/account/orders/index/{id}', [OrderController::class, 'index'])->middleware(['auth', 'validate-user-infos', 'prevent-back-history'])->name('user.orders.index');
Route::get('user/account/orders/show/{id}', [OrderController::class, 'show'])->middleware(['auth', 'validate-user-infos', 'prevent-back-history'])->name('user.orders.show');
// ==========================================================================================================================================================


// ==========================================================================================================================================================
// TICKETS / USER ACCOUNT TICKETS
Route::get('user/account/tickets/{id?}', [TicketController::class, 'index'])->middleware(['auth', 'validate-user-infos'])->name('user.tickets.index');
Route::get('user/tickets/create/{id?}', [TicketController::class, 'create'])->name('user.tickets.create');
Route::post('user/tickets/store/{id?}', [TicketController::class, 'store'])->middleware('prevent-back-history')->name('user.tickets.store');
Route::get('user/account/tickets/show/{id?}', [TicketController::class, 'show'])->middleware(['auth', 'validate-user-infos',])->name('user.tickets.show');
Route::patch('user/account/tickets/close/{id?}', [TicketController::class, 'update'])->middleware(['auth', 'validate-user-infos', 'prevent-back-history'])->name('user.tickets.patch');
// ==========================================================================================================================================================



// ==========================================================================================================================================================
// MESSAGES / SINGLE ACTION CONTROLLER (INVOKE)
Route::post('user/account/tickets/message/submit/{id}', MessageController::class)->middleware(['auth', 'validate-user-infos', 'prevent-back-history'])->name('user.tickets.message.submit');
// ==========================================================================================================================================================




// ==========================================================================================================================================================
// AUTH, REGISTER, OAUTH
Route::get('/finish_registeration/{user}', [oAuthController::class, 'returnViewToCompleteRegisteration'])->middleware(['auth', 'prevent-back-history'])->name('finish.registeration');
Route::controller(GoogleController::class)->name('google.')->group(function () {
    Route::get('/auth/google', 'auth')->name('auth');
    Route::get('/auth/google/redirect', 'redirect')->name('redirect');
    Route::get('google/finish_registeration/{user}', 'returnViewToCompleteRegisteration')->middleware(['auth', 'validate-user-infos', 'prevent-back-history'])->name('finish.registeration');
});


Route::controller(GithubController::class)->name('github.')->group(function () {
    Route::get('/auth/github', 'auth')->name('auth');
    Route::get('/auth/github/redirect', 'redirect')->name('redirect');
    Route::get('github/finish_registeration/{user}', 'returnViewToCompleteRegisteration')->middleware(['auth', 'validate-user-infos', 'prevent-back-history'])->name('finish.registeration');
});


Route::controller(oAuthController::class)->name('oAuth.')->prefix('oAuth/')->middleware((['auth', 'prevent-back-history']))->group(function () {
    Route::post('register/', 'updateOAuthUser')->name('register');
});
// ==========================================================================================================================================================


// ==========================================================================================================================================================
// CREDIT CARD AND PAYMENT
Route::get('/paiement', [StripeController::class, 'stripe']);
Route::post('/paiement', [StripeController::class, 'stripePost'])->name('stripe.post');


Route::post('/getAuthUserCreditCard', [CreditcardController::class, 'getCreditCardForLoggedUser'])->middleware('auth')->name('creditcard.user.auth');
// ==========================================================================================================================================================

//MIDDLLEEWARRRREEE

Route::prefix('admin/')->name('admin.')->group(function() {
    Route::controller(GestionAdminController::class)->middleware('auth')->group(function () {
        Route::get('admin/gestion', 'index')->name('admin.index');
        Route::post('{id}/admin/edit', 'edit')->name('admin.edit');
    });

    
    Route::resource('client', GestionClientController::class);
    Route::resource('admin', GestionAdminController::class);
    Route::resource('ticket', GestionTicketController::class);


    Route::get('/menu/ajouter', [MenuAdmin::class, 'create'])->name('menu');
    Route::post('/menu/ajouter', [MenuAdmin::class, 'store'])->name('menu.store');
    Route::get('/menu/rechercher', [MenuAdmin::class, 'research'])->name('menu.research');
    Route::post('/menu/rechercher', [MenuAdmin::class, 'search'])->name('menu.search');
    Route::get('/menu/edit/{id}', [MenuAdmin::class, 'edit'])->name('menu.edit');
    Route::put('/menu/edit/{id}', [MenuAdmin::class, 'update'])->name('menu.update');
    // Route::post('/menu/modifier/{id}', [MenuAdmin::class, 'update'])->name('menu.update');
    Route::delete('/menu/supprimer/{id}', [MenuAdmin::class, 'destroy'])->name('menu.destroy');
});


