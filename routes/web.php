<?php

use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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
    return redirect()->route('user.login.view');
});

Route::get('/home', function () {
    return view('welcome');
})->name('welcome')->middleware(['auth']);

Route::prefix('client')->middleware(['auth'])->group(function () {
    Route::get('/search', [ClientController::class, 'index'])->name('kos.search');
});

Route::prefix('account')->group(function () {
    Route::get('/profil', [AuthController::class, 'profileView'])->middleware(['auth'])->name('user.profil.view');
    Route::post('/profil', [AuthController::class, 'updateProfil'])->middleware(['auth'])->name('user.profil.update');
    Route::get('/login', [AuthController::class, 'loginView'])->middleware('guest')->name('user.login.view');
    Route::post('/login', [AuthController::class, 'login'])->name('user.login.auth');
    Route::get('/register', [AuthController::class, 'registerView'])->middleware('guest')->name('user.register.view');
    Route::post('/register', [AuthController::class, 'register'])->name('user.register.create');
    Route::post('/logout', [AuthController::class, 'logout'])->name('user.logout');
});

Route::prefix('admin')->middleware(['auth'])->group(function(){

});

Route::prefix('pemilik')->middleware(['auth'])->group(function(){

});

Route::get('/heay', function () {
    return 'heay';
});
