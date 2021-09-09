<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserSettingController;
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
    return view('home');
})->name('home');

Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [UserController::class, 'create'])->name('user.create');
    Route::post('/register', [UserController::class, 'store'])->name('user.store');

    Route::get('/login', [UserController::class, 'loginForm'])->name('user.loginForm');
    Route::post('/login', [UserController::class, 'login'])->name('user.login');
});

Route::get('/logout', [UserController::class, 'logout'])->name('user.logout')->middleware('auth');

Route::group(['middleware' => 'auth', 'prefix' => 'my'], function () {
   Route::get('/', [UserController::class, 'profile'])->name('user.profile');

   Route::get('/groups', [UserController::class, 'groups'])->name('user.groups');

   Route::resource('/settings', UserSettingController::class);
});
