<?php

use App\Http\Controllers\AdministratorController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\KurirController;
use App\Http\Controllers\MitraController;
use App\Http\Controllers\NarahubungController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\ProfileController;
use App\Models\Konten;
use App\Models\Narahubung;
use App\Models\User;
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
    $kontaks = Narahubung::all();
    return view('welcome',[
        'kontaks'   =>  $kontaks,
    ]);
})->name('welcome');

Route::get('/dashboard', function () {
    $jumlahBeranda = Konten::where('tipe_konten','beranda')->count();
    $jumlahPengumuman = Konten::where('tipe_konten','pengumuman')->count();
    $jumlahMitra = User::where('role','mitra')->count();
    $jumlahKurir = User::where('role','kurir')->count();
    $jumlahAdministrator = User::where('role','administrator')->count();
    $jumlahNarahubung = Narahubung::count();

    return view('dashboard',[
        'jumlahBeranda' =>  $jumlahBeranda,
        'jumlahPengumuman' =>  $jumlahPengumuman,
        'jumlahMitra' =>  $jumlahMitra,
        'jumlahKurir' =>  $jumlahKurir,
        'jumlahAdministrator' =>  $jumlahAdministrator,
        'jumlahNarahubung' =>  $jumlahNarahubung,
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::controller(BerandaController::class)->middleware('auth')->prefix('/informasi_beranda')->group(function(){
    Route::get('/', 'index')->name('beranda');
    Route::post('/', 'store')->name('beranda.store');
    Route::get('/{beranda}/edit', 'edit')->name('beranda.edit');
    Route::patch('/update', 'update')->name('beranda.update');
    Route::delete('/{beranda}/delete', 'delete')->name('beranda.delete');
});

Route::controller(PengumumanController::class)->middleware('auth')->prefix('/informasi_pengumuman')->group(function(){
    Route::get('/', 'index')->name('pengumuman');
    Route::post('/', 'store')->name('pengumuman.store');
    Route::get('/{pengumuman}/edit', 'edit')->name('pengumuman.edit');
    Route::patch('/update', 'update')->name('pengumuman.update');
    Route::delete('/{pengumuman}/delete', 'delete')->name('pengumuman.delete');
});

Route::controller(MitraController::class)->prefix('data_mitra/')->group(function () {
    Route::get('/', 'index')->name('mitra');
    Route::get('/create', 'create')->name('mitra.create');
    Route::post('/', 'store')->name('mitra.store');
    Route::get('/{mitra}/edit', 'edit')->name('mitra.edit');
    Route::patch('/{mitra}/update', 'update')->name('mitra.update');
    Route::delete('/{mitra}/delete', 'delete')->name('mitra.delete');
    Route::patch('/ubah_password', 'ubahPassword')->name('mitra.updatePassword');
});

Route::controller(KurirController::class)->prefix('data_kurir/')->group(function () {
    Route::get('/', 'index')->name('kurir');
    Route::get('/create', 'create')->name('kurir.create');
    Route::post('/', 'store')->name('kurir.store');
    Route::get('/{kurir}/edit', 'edit')->name('kurir.edit');
    Route::patch('/{kurir}/update', 'update')->name('kurir.update');
    Route::delete('/{kurir}/delete', 'delete')->name('kurir.delete');
    Route::patch('/ubah_password', 'ubahPassword')->name('kurir.updatePassword');
});

Route::controller(AdministratorController::class)->prefix('data_administrator/')->group(function () {
    Route::get('/', 'index')->name('administrator');
    Route::get('/create', 'create')->name('administrator.create');
    Route::post('/', 'store')->name('administrator.store');
    Route::get('/{administrator}/edit', 'edit')->name('administrator.edit');
    Route::patch('/{administrator}/update', 'update')->name('administrator.update');
    Route::delete('/{administrator}/delete', 'delete')->name('administrator.delete');
    Route::patch('/ubah_password', 'ubahPassword')->name('administrator.updatePassword');
});

Route::controller(NarahubungController::class)->middleware('auth')->prefix('/kontak_narahubung')->group(function(){
    Route::get('/', 'index')->name('narahubung');
    Route::post('/', 'store')->name('narahubung.store');
    Route::get('/{narahubung}/edit', 'edit')->name('narahubung.edit');
    Route::patch('/update', 'update')->name('narahubung.update');
    Route::delete('/{narahubung}/delete', 'delete')->name('narahubung.delete');
});
