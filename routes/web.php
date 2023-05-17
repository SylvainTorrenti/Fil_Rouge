<?php

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
})->name('acceuil');
Route::get('/creationCompte', function () {
    return view('creationCompte');
})->Name('creationCompte');
Route::get('/creationMessage', function () {
    return view('creationMessage');
})->Name('creationMessage');
Route::get('/creationTicket', function () {
    return view('creationTicket');
})->Name('creationTicket');
// Route::post('/logUser', function () {
//     return view('logUser');
// })->Name('logUser');
Route::get('/mdpoubli', function () {
    return view('mdpoubli');
})->Name('mdpoubli');
Route::get('/messageUser', function () {
    return view('messageUser');
})->Name('messageUser');
Route::get('/statutTicket', function () {
    return view('statutTicket');
})->Name('statutTicket');
