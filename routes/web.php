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
Route::get('/auth', function () {
    return view('cour/welcome');
});


Route::get('home', function () {
    return view('home');
})->middleware('auth');

//route du projet
Route::get('/', function () {
    return view('fil_rouge/auth/login');
});

Route::get('/acceuil', function () {
    return view('fil_rouge/auth/login');
})->name('acceuil');


Route::get('fil_rouge/logUser', [TicketController::class, 'displayTickets'])->Name('logUser');
Route::post('fil_rouge/logUser', [TicketController::class, 'createTicketPost'])->Name('logUserPost');


Route::get('/statutTicket/{n}', [TicketController::class, 'displayOneTicket'])->Name('statutTicket');

Route::get('/creationTicket', [TicketController::class, 'createTicket'])->Name('creationTicket');

Route::get('/creationMessage/{n}', [TicketController::class, 'createMessage'])->Name('creationMessage');


//a revoir


Route::get('/creationCompte', [UserController::class, 'createAccount'])->Name('creationCompte');
Route::post('/creationCompte', [UserController::class, 'storeAccount'])->Name('storeAccount');

Route::post('/creationMessage', [TicketController::class, 'storeMessage'])->Name('storeMessage');

Route::post('/creationTicket', [TicketController::class, 'storeTicket'])->Name('storeTicket');



Route::get('/mdpoubli', [UserController::class, 'password'])->Name('mdpoubli');
Route::post('/mdpoubli', [UserController::class, 'passwordForgot'])->Name('mdpOubliForm');


// exemple cour
Route::get('/users', [UserController::class, 'create'])->name("users.create");
Route::post('/users', [UserController::class, 'store'])->name("users.store");

Route::get('/dept', [DeptController::class, 'AfficherDepartements'])->name('dept.list');
Route::get('/dept/{n}', [DeptController::class, 'AfficherDepartement'])->name('deptdetail');
