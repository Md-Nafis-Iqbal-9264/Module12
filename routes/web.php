<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TripController;
use App\Http\Controllers\TicketController;

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

// Home Page
Route::get('/', function () {
    return view('app'); // You can replace 'welcome' with your home page view
})->name('home');

// Routes for TripController
Route::resource('trips', TripController::class);

// Routes for TicketController
Route::get('tickets', [TicketController::class, 'index'])->name('tickets.index');
Route::post('tickets/purchase', [TicketController::class, 'purchase'])->name('tickets.purchase');
