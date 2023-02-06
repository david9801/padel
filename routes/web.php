<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Mail\WelcomeMail;
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
    return view('explain.welcome');
})->name('welcome');

Route::get('/aboutus', function () {
    return view('explain.about');
})->name('about');

Route::get('/galeria', function () {
    return view('explain.gallery');
})->name('carrousel');


Route::get('/goto-reserves', function () {
    return view('reserve.reserves');
})->name('goto-reserve')->middleware('auth');

Route::get('/goto-admin', function () {
    return view('users.AdminUser');
})->name('admin')->middleware('auth');

Route::get('/register',[RegisterController::class,'create'])->name('goto-Register')->middleware('guest');
Route::POST('/do-register',[RegisterController::class,'store'])->name(('do-register'))->middleware('guest');

Route::get('/login',[SessionsController::class,'login'])->name('goto-Login')->middleware('guest');
Route::POST('/do-login',[SessionsController::class,'dologin'])->name('do-login')->middleware('guest');

Route::POST('/logout',[SessionsController::class,'logout'])->name('logout')->middleware('auth');
Route::delete('/usuarios/{id}',[SessionsController::class,'destroy'])->name('delete')->middleware('auth');


