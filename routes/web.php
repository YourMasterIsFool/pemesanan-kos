<?php

use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DaftarPemilikController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KosController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PemesananController;

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



Route::prefix('client')->middleware(['auth'])->group(function () {
    Route::get('/home', [ClientController::class, 'homeView'])->name('client.welcome');

    Route::get('/profil', [ClientController::class, 'profileView'])->name('client.profile');

    Route::prefix('booking')->group(function () {
        Route::get('/', [ClientController::class, 'bookingView'])->name('client.booking');
    });

    Route::prefix('pemesanan')->group(function () {
        Route::get('/', [ClientController::class, 'pemesananView'])->name('client.pemesanan');
        Route::get('/{id}/edit', [ClientController::class, 'editPesananView'])->name('client.pemesanan.edit.view');
        Route::post('/{id}/edit', [ClientController::class, 'editPesananSave'])->name('client.pemesanan.edit.save');
        Route::post('/{id}/booking', [ClientController::class, 'bookingPesanan'])->name('client.pemesanan.edit.booking');
        Route::delete('/batal/{id}', [ClientController::class, 'batalkanPesanan'])->name('client.pemesanan.batal');
    });

    Route::prefix('pembayaran')->group(function () {
        Route::get('/', [ClientController::class, 'pembayaranView'])->name('client.pembayaran');
        Route::get('/batal/{id}', [ClientController::class, 'batalkanPesanan'])->name('client.pembayaran.batal');
    });

    Route::prefix('kos')->group(function () {
        Route::get('/search', [ClientController::class, 'index'])->name('kos.search');
        Route::get('/{id}', [ClientController::class, 'detailKosById'])->name('kos.detail');
        Route::post('/{id}', [ClientController::class, 'pesanKos'])->name('kos.pesan');
    });
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



Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard.admin.index');
    Route::prefix('kos')->group(function () {
        Route::get('/', [KosController::class, 'kosAdminView'])->name('dashboard.daftarkos.index');
        Route::get('/maps', [KosController::class, 'kosAdminMapView'])->name('dashboard.daftarmapkos.index');
    });
    Route::prefix('daftarpemilik')->group(function () {
        Route::get('/', [DaftarPemilikController::class, 'index'])->name('dashboard.daftarpemilik.index');
        Route::get('/create', [DaftarPemilikController::class, 'createView'])->name('dashboard.daftarpemilik.createview');
        Route::post('/create', [DaftarPemilikController::class, 'save'])->name('dashboard.daftarpemilik.save');
        Route::get('/{id}/edit', [DaftarPemilikController::class, 'editView'])->name('dashboard.daftarpemilik.editview');
        Route::post('/{id}/edit', [DaftarPemilikController::class, 'editSave'])->name('dashboard.daftarpemilik.editsave');
        Route::delete('/{id}', [DaftarPemilikController::class, 'delete'])->name('dashboard.daftarpemilik.delete');
    });
});

Route::prefix('pemilik')->middleware(['auth', 'pemilik'])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'indexPemilik'])->name('dashboard.pemilik.index');
    Route::prefix('kos')->group(function () {
        Route::get('/', [KosController::class, 'index'])->name('dashboard.kos.index');
        Route::get('/view', [KosController::class, 'viewKosMap'])->name('dashboard.kos.map.view');
        Route::get('/create', [KosController::class, 'createView'])->name('dashboard.kos.createview');
        Route::post('/create', [KosController::class, 'save'])->name('dashboard.kos.save');
        Route::get('/{id}/edit', [KosController::class, 'editView'])->name('dashboard.kos.editview');
        Route::post('/{id}/edit', [KosController::class, 'editSave'])->name('dashboard.kos.editsave');
        Route::delete('/{id}', [KosController::class, 'delete'])->name('dashboard.kos.delete');
    });

    Route::prefix('tagihan')->group(function(){

    });

    Route::prefix('pemesanan')->group(function () {
        Route::get('/', [PemesananController::class, 'index'])->name('pemilik.pemesanan.index');
        Route::get('/{id}', [PemesananController::class, 'detail'])->name('pemilik.pemesanan.detail');
    });

    Route::prefix('pembayaran')->group(function () {
        Route::get('/', [PembayaranController::class, 'index'])->name('pemilik.pembayaran.index');
        Route::get('/{id}', [PembayaranController::class, 'detail'])->name('pemilik.pembayaran.detail');
    });
});

Route::get('/heay', function () {
    return 'heay';
});
