<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\ReservesController;
use App\Mail\WelcomeMail;
use App\Http\Controllers\Auth\VerificationController;

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

Route::get('/goto-admin', function () {
    return view('users.AdminUser');
})->name('admin')->middleware('auth');

Route::get('/register',[RegisterController::class,'create'])->name('goto-Register')->middleware('guest');
Route::POST('/do-register',[RegisterController::class,'store'])->name(('do-register'))->middleware('guest');

Route::get('/login',[SessionsController::class,'login'])->name('goto-Login')->middleware('guest');
Route::POST('/do-login',[SessionsController::class,'dologin'])->name('do-login')->middleware('guest');

Route::POST('/logout',[SessionsController::class,'logout'])->name('logout')->middleware('auth');
Route::delete('/usuarios/{id}',[SessionsController::class,'destroy'])->name('delete')->middleware('auth');
Route::put('/user-edit/{id}',[SessionsController::class,'edit'])->name('edit-user')->middleware('auth');
Route::put('upload-photo/{id}',[SessionsController::class,'upload'])->name('up')->middleware('auth');

Route::resource('reserves',ReservesController::class)->middleware('auth');
Route::get('send-reserve',[ReservesController::class,'send'])->name('sending')->middleware('auth');
Route::get('email/verify', [VerificationController::class,'show'])->name('verification.notice');
Route::get('email/verify/{id}', [VerificationController::class,'verify'])->name('verification.verify');
Route::get('email/resend', [VerificationController::class,'resend'])->name('verification.resend');

/*
+--------+-----------+------------------------+------------------+-------------------------------------------------+------------+
| Domain | Method    | URI                    | Name             | Action                                          | Middleware |
+--------+-----------+------------------------+------------------+-------------------------------------------------+------------+
|        | GET|HEAD  | /                      | welcome          | Closure                                         | web        |
|        | GET|HEAD  | aboutus                | about            | Closure                                         | web        |
|        | GET|HEAD  | api/user               |                  | Closure                                         | api        |
|        |           |                        |                  |                                                 | auth:api   |
|        | POST      | do-login               | do-login         | App\Http\Controllers\SessionsController@dologin | web        |
|        |           |                        |                  |                                                 | guest      |
|        | POST      | do-register            | do-register      | App\Http\Controllers\RegisterController@store   | web        |
|        |           |                        |                  |                                                 | guest      |
|        | GET|HEAD  | galeria                | carrousel        | Closure                                         | web        |
|        | GET|HEAD  | goto-admin             | admin            | Closure                                         | web        |
|        |           |                        |                  |                                                 | auth       |
|        | GET|HEAD  | login                  | goto-Login       | App\Http\Controllers\SessionsController@login   | web        |
|        |           |                        |                  |                                                 | guest      |
|        | POST      | logout                 | logout           | App\Http\Controllers\SessionsController@logout  | web        |
|        |           |                        |                  |                                                 | auth       |
|        | GET|HEAD  | register               | goto-Register    | App\Http\Controllers\RegisterController@create  | web        |
|        |           |                        |                  |                                                 | guest      |
|        | GET|HEAD  | reserves               | reserves.index   | App\Http\Controllers\ReservesController@index   | web        |
|        |           |                        |                  |                                                 | auth       |
|        | POST      | reserves               | reserves.store   | App\Http\Controllers\ReservesController@store   | web        |
|        |           |                        |                  |                                                 | auth       |
|        | GET|HEAD  | reserves/create        | reserves.create  | App\Http\Controllers\ReservesController@create  | web        |
|        |           |                        |                  |                                                 | auth       |
|        | GET|HEAD  | reserves/{reserf}      | reserves.show    | App\Http\Controllers\ReservesController@show    | web        |
|        |           |                        |                  |                                                 | auth       |
|        | PUT|PATCH | reserves/{reserf}      | reserves.update  | App\Http\Controllers\ReservesController@update  | web        |
|        |           |                        |                  |                                                 | auth       |
|        | DELETE    | reserves/{reserf}      | reserves.destroy | App\Http\Controllers\ReservesController@destroy | web        |
|        |           |                        |                  |                                                 | auth       |
|        | GET|HEAD  | reserves/{reserf}/edit | reserves.edit    | App\Http\Controllers\ReservesController@edit    | web        |
|        |           |                        |                  |                                                 | auth       |
|        | PUT       | user-edit/{id}         | edit-user        | App\Http\Controllers\SessionsController@edit    | web        |
|        |           |                        |                  |                                                 | auth       |
|        | DELETE    | usuarios/{id}          | delete           | App\Http\Controllers\SessionsController@destroy | web        |
|        |           |                        |                  |                                                 | auth       |
|        | GET|HEAD  | email/resend           | verification.resend | App\Http\Controllers\Auth\VerificationController@resend | web        |
|        | GET|HEAD  | email/verify           | verification.notice | App\Http\Controllers\Auth\VerificationController@show   | web        |
|        | GET|HEAD  | email/verify/{id}      | verification.verify | App\Http\Controllers\Auth\VerificationController@verify | web        |
+--------+-----------+------------------------+------------------+-------------------------------------------------+------------+

*/
