<?php


use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\CandidatoRegister;
use App\Http\Controllers\Auth\EmpresaRegister;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AnuncioController;

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

// Auth::routes();
Auth::routes(['verify' => true]);

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('is_registered');
Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');
Route::get('/search', [HomeController::class, 'index'])->name('search');

Route::post('register_candidato', [CandidatoRegister::class, 'create'])->name('register_candidato');
Route::post('register_empresa', [EmpresaRegister::class, 'create'])->name('register_empresa');

Route::post('profile', [ProfileController::class, 'index'])->name('profile');

Route::post('insert_anuncio_form', [AnuncioController::class, 'indexInsertAnuncio'])->name('insert_anuncio_form');
Route::post('insert_anuncio', [AnuncioController::class, 'insertAnuncio'])->name('insert_anuncio');

Route::get('/{anuncio}', [AnuncioController::class, 'show'])->name('show_anuncio');


Route::post('apply_anuncio', [AnuncioController::class, ''])->name('apply_anuncio');