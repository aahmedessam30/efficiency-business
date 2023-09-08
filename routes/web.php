<?php

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
    return inertia('Welcome/index', ['appName' => config('app.name')]);
})->name('home');

Route::get('/about', function () {
    return inertia('About/index', ['appName' => config('app.name')]);
})->name('about');

Route::get('/contact', function () {
    return inertia('Contact/index', ['appName' => config('app.name')]);
})->name('contact');
