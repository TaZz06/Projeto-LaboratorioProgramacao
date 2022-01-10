<?php


use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\CandidatoRegister;
use App\Http\Controllers\Auth\EmpresaRegister;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AnuncioController;
use App\Http\Controllers\DownloadFileController;

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
    return redirect()->route('home');
});

// Auth::routes();
Auth::routes(['verify' => true]);

Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('is_registered');
Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');
Route::get('/search', [HomeController::class, 'index'])->name('search');

Route::post('register', [RegisterController::class, 'create'])->name('register');
Route::post('register_candidato', [CandidatoRegister::class, 'create'])->name('register_candidato');
Route::post('register_empresa', [EmpresaRegister::class, 'create'])->name('register_empresa');

Route::post('profile', [ProfileController::class, 'index'])->name('profile');
Route::post('edit_profile', [ProfileController::class, 'edit_profile'])->name('edit_profile');
Route::get('edit_profile_form', [ProfileController::class, 'edit_index'])->name('edit_profile_form');
Route::get('/download/{path}/', [DownloadFileController::class, 'downloadFile'])->name('download_cv');

Route::post('insert_anuncio_form', [AnuncioController::class, 'indexInsertAnuncio'])->name('insert_anuncio_form');
Route::post('insert_anuncio', [AnuncioController::class, 'insert_anuncio'])->name('insert_anuncio');
Route::get('/anuncio/{anuncio}/', [AnuncioController::class, 'show'])->name('show_anuncio');
Route::post('apply_anuncio', [AnuncioController::class, 'appliance'])->name('apply_anuncio')->middleware('is_candidate');
Route::get('/remove_anuncio/{anuncio}/', [AnuncioController::class, 'remove_anuncio'])->name('remove_anuncio');


