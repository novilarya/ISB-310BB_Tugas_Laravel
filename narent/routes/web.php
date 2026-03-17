<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');

Route::post('/login', [AuthController::class, 'login'])->name('login.proses');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/armada/grand-priority', function() {
    return view('armada.grandpriorityclass');
})->name('armada.grand_priority');

Route::get('/index', function() {
    return view('index');
})->name('index');