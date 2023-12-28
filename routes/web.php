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

Route::get('/', fn () => Inertia('Home/index'))->name('home');
Route::get('/contact-us', fn () => inertia('ContactUs/index'))->name('contact-us');
Route::get('/services', fn () => inertia('OurServices/index'))->name('our-services');
