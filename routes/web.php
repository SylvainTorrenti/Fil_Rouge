<?php

use App\Http\Controllers\DeptController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TicketController;
use Faker\Guesser\Name;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('acceuil');
});

Route::get('/acceuil', function () {
    return view('acceuil');
})->name('acceuil');

Route::get('/creationCompte', [UserController::class, 'createAccount'])->Name('creationCompte');
Route::post('/creationCompte', [UserController::class, 'storeAccount'])->Name('storeAccount');

Route::get('/creationMessage', [TicketController::class, 'createMessage'])->Name('creationMessage');
Route::post('/creationMessage', [TicketController::class, 'storeMessage'])->Name('storeMessage');

Route::get('/creationTicket', [TicketController::class, 'createTicket'])->Name('creationTicket');
Route::post('/creationTicket', [TicketController::class, 'storeTicket'])->Name('storeTicket');

Route::get('/logUser', [UserController::class, 'aChanger'])->Name('logUser');


Route::get('/mdpoubli', [UserController::class, 'password'])->Name('mdpoubli');
Route::post('/mdpoubli', [UserController::class, 'passwordForgot'])->Name('mdpOubliForm');

Route::get('/statutTicket', [TicketController::class, 'displayTicket'])->Name('statutTicket');

// exemple cour
Route::get('/users', [UserController::class, 'create'])->name("users.create");
Route::post('/users', [UserController::class, 'store'])->name("users.store");

Route::get('/dept', [DeptController::class, 'AfficherDepartements']);
