<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\ShowPolizas;
use App\Http\Livewire\CreatePoliza;

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
    return view('auth/login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', ShowPolizas::class)->name('dashboard');

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/zabbix', function () {
    return view('zabbix');
})->name('zabbix');

Route::middleware(['auth:sanctum', 'verified'])->get('/documentacion', function () {
    return view('documentacion');
})->name('documentacion');

Route::middleware(['auth:sanctum', 'verified'])->get('/proyectos', function () {
    return view('proyectos');
})->name('proyectos');

// Route::post('EnvioDatos', [CreatePolizas::class, 'Insertar']);