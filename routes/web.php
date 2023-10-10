<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\EditController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TambahController;
use App\Http\Controllers\SiswaController;


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

Route::get('/',  [HomeController::class, 'index'])->name('home');
Route::get('/admin',  [AdminController::class, 'index'])->name('admin');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/projects', [ProjectsController::class, 'index'])->name('projects');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');

//login
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/auth', [LoginController::class, 'authenticate'])->name('login.auth');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    // Admin
    Route::get('/',  [SiswaController::class, 'index'])->name('siswa.index');
    Route::get('/admin/siswa/create',  [SiswaController::class, 'create'])->name('siswa.create');
    Route::delete('/admin/siswa/delete/{id}', [SiswaController::class, 'Delete'])->name('siswa.delete');
    Route::post('/admin/siswa',  [SiswaController::class, 'store'])->name('siswa.store');
    Route::get('/admin/siswa/{id}/edit',  [SiswaController::class, 'edit'])->name('siswa.edit');
    Route::put('/admin/siswa/{id}',  [SiswaController::class, 'update'])->name('siswa.update');

    // Project
    Route::resource('admin/project', ProjectController::class);
    Route::get('/admin/project/{id}/create', [ProjectController::class, 'add'])->name('project.add');
    Route::get('/admin/project/{id}/edit', [ProjectController::class, 'edit'])->name('project.edit');
    Route::post('/admin/project/{id}/update', [ProjectController::class, 'update'])->name('project.update');
    Route::delete('/admin/project/{id}/delete', [ProjectController::class, 'delete'])->name('project.delete');

    //Kontak
    Route::get('/admin/kontak', [ContactController::class, 'index'])->name('contact.index');
});

Route::middleware(['auth', 'role:user'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    // Admin
    Route::get('/',  [SiswaController::class, 'index'])->name('siswa.index');
    // Project
    Route::resource('admin/project', ProjectController::class);
});
