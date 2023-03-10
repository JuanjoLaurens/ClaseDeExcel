<?php

use App\Http\Controllers\CitaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\MascotaController;



use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/clientes', [ClienteController::class, 'index'])->name('clientes.index');
Route::get('/clientes/create', [ClienteController::class, 'create'])->name('clientes.create');
Route::post('/clientes', [ClienteController::class, 'store'])->name('clientes.store');
Route::get('/clientes/{id}', [ClienteController::class, 'show'])->name('clientes.show');
Route::get('/clientes/{id}/edit', [ClienteController::class, 'edit'])->name('clientes.edit');
Route::put('/clientes/{id}', [ClienteController::class, 'update'])->name('clientes.update');
Route::delete('/clientes/{id}', [ClienteController::class, 'destroy'])->name('clientes.destroy');

Route::get('/mascotas', [MascotaController::class, 'index'])->name('mascotas.index');
Route::get('/mascotas/create', [MascotaController::class, 'create'])->name('mascotas.create');
Route::post('/mascotas', [MascotaController::class, 'store'])->name('mascotas.store');
// Route::get('/mascotas/{id}', [MascotaController::class, 'show'])->name('mascotas.show');
Route::get('/mascotas/{id}/edit', [MascotaController::class, 'edit'])->name('mascotas.edit');
Route::put('/mascotas/{id}', [MascotaController::class, 'update'])->name('mascotas.update');
Route::delete('/mascotas/{id}', [MascotaController::class, 'destroy'])->name('mascotas.destroy');

Route::get('citas', [CitaController::class, 'index'])->name('citas.index');
Route::get('citas/create', [CitaController::class, 'create'])->name('citas.create');
Route::post('citas', [CitaController::class, 'store'])->name('citas.store');
Route::get('citas/{cita}/edit', [CitaController::class, 'edit'])->name('citas.edit');
Route::put('citas/{cita}', [CitaController::class, 'update'])->name('citas.update');
Route::delete('citas/{cita}', [CitaController::class, 'destroy'])->name('citas.destroy');

// Rutas para FullCalendar
Route::get('citas/fullcalendar', [CitaController::class, 'fullcalendar'])->name('citas.fullcalendar');
Route::get('citas/{cita}', [CitaController::class, 'show'])->name('citas.show');

Route::get('/citas/check-availability', [CitaController::class, 'checkAvailability'])->name('citas.check-availability');





