<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EventController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PoliticasController;

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
    return view('inicio');
})->name('inicio');

/**
 * Rutas de eventos. Para el metodo show se pasara por el middleware de autenticacion
 */

Route::resource('events', EventController::class)
->parameters(['events' => 'event'])
->names([
    'index' => 'events.index',
    'create' => 'events.create',
    'store' => 'events.store',
    'show' => 'events.show',
    'edit' => 'events.edit',
    'update' => 'events.update',
    'destroy' => 'events.destroy',
]);

// Inscribirse y desinscribirse de un evento
Route::get('events/signup/{event}', [EventController::class, 'signup'])->name('events.signup');
Route::get('events/unsignup/{event}', [EventController::class, 'unsignup'])->name('events.unsignup');


Route::middleware(["auth"])->group(function (){
    Route::resource('events', EventController::class)->only(['show']);
});


/**
 * Rutas de miembros
 */
Route::resource('members', UsersController::class)
->parameters(['members' => 'member'])
->names([
    'index' => 'members.index',
    'create' => 'members.create',
    'show' => 'members.show',
    'edit' => 'members.edit',
    'store' => 'members.store',
    'update' => 'members.update',
])->except(['destroy']);


/**
 * Rutas de mensajes
 */
Route::resource('messages', MessageController::class)
->parameters(['messages' => 'message'])
->names([
    'create' => 'messages.create',
    'edit' => 'messages.edit',
    'store' => 'messages.store',
    'destroy' => 'messages.destroy',
])->except(['update']);

/** Donde estamos ruta */
Route::get('donde_estamos', function () {
    return view('donde_estamos');
})->name('donde_estamos');

/* Solo admins */
Route::middleware(["isAdmin"])->group(function (){
    Route::resource('events', EventController::class)->only(['edit']);
    Route::resource('messages', MessageController::class)->only(['index', 'show']);
});


/* AUTH */
Route::get('register', [LoginController::class, 'registerForm']);
Route::post('register', [LoginController::class, 'register'])->name('register');
Route::get('login', [LoginController::class, 'loginForm']);
Route::post('login', [LoginController::class, 'login'])->name('login');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

/* Politicas */
Route::get('politica_privacidad', [PoliticasController::class, 'politicaPrivacidad']);
Route::get('politica_cookies', [PoliticasController::class, 'politicaCookies']);
Route::get('configuracion_cookies', [PoliticasController::class, 'configuracionCookies']);
Route::get('terminos_condiciones', [PoliticasController::class, 'terminosCondiciones']);


