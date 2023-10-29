<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\PaginasController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProyectosController;

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

Route::get('/', [InicioController::class,"index"]
)->name('index');

Route::post('/', [InicioController::class,"sendEmail"]
)->name('sendEmail');
Route::get('/dashboard',DashboardController::class)->middleware(['auth','verified','redirecAccess'])->name('dashboard');

Route::get('/proyectos',[ProjectController::class,'index'])->middleware(['auth','verified','redirecAccess'])->name('projects');
Route::get('/portafolio',[ProyectosController::class,'index'])->name('portafolio');
Route::get('/proyectos/create',[ProjectController::class,'create'])->middleware(['auth','verified','redirecAccess'])->name('projects.create');
Route::get('/proyectos/{project}/edit',[ProjectController::class,'edit'])->middleware(['auth','verified','redirecAccess'])->name('projects.edit');
Route::get('/politica-privacidad',PaginasController::class)->name('privacidad');
// Route::delete('/proyectos/{project}',[ProjectController::class,'destroy'])->middleware(['auth','verified'])->name('projects.destroy');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
