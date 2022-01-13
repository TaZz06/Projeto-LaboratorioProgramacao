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
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\AdminHomeController;

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
Route::get('/search', [HomeController::class, 'index'])->name('search');

Route::get('/admin_home', [AdminHomeController::class, 'index'])->name('admin_home')->middleware('is_admin')->middleware('is_registered');
Route::get('/users_dashboard', [AdminHomeController::class, 'users_dashboard'])->name('users_dashboard');
Route::get('/candidates_dashboard', [AdminHomeController::class, 'candidates_dashboard'])->name('candidates_dashboard');
Route::get('/companies_dashboard', [AdminHomeController::class, 'companies_dashboard'])->name('companies_dashboard');
Route::get('/anuncios_dashboard', [AdminHomeController::class, 'anuncios_dashboard'])->name('anuncios_dashboard');
Route::get('/applications_dashboard', [AdminHomeController::class, 'applications_dashboard'])->name('applications_dashboard');

Route::post('/register_user', [RegisterController::class, 'create'])->name('register_user');
Route::post('/register_candidato', [CandidatoRegister::class, 'create'])->name('register_candidato');
Route::post('/register_empresa', [EmpresaRegister::class, 'create'])->name('register_empresa');

Route::get('/profile', [ProfileController::class, 'index'])->name('profile')->middleware('is_registered');
Route::get('/edit_profile_form', [ProfileController::class, 'edit_index'])->name('edit_profile_form');
Route::put('/edit_profile', [ProfileController::class, 'edit_profile'])->name('edit_profile');
Route::put('/edit_profile_photo/{photo_id}/{user_id}/', [ProfileController::class, 'edit_profile_photo'])->name('edit_photo');

Route::get('/download/{path}/', [DownloadFileController::class, 'downloadFile'])->name('download_cv');

Route::get('/insert_anuncio_form', [AnuncioController::class, 'indexInsertAnuncio'])->name('insert_anuncio_form');
Route::post('/insert_anuncio', [AnuncioController::class, 'insert_anuncio'])->name('insert_anuncio');
Route::get('/anuncio/{anuncio}/', [AnuncioController::class, 'show'])->name('show_anuncio');
Route::get('/edit_anuncio_form/{anuncio}/', [AnuncioController::class, 'indexEditAnuncio'])->name('edit_anuncio_form');
Route::put('/edit_anuncio/{anuncio}/', [AnuncioController::class, 'edit_anuncio'])->name('edit_anuncio');
Route::delete('/remove_anuncio/{anuncio}/', [AnuncioController::class, 'remove_anuncio'])->name('remove_anuncio');

Route::post('/apply_anuncio/{anuncio}/', [ApplicationController::class, 'appliance'])->name('apply_anuncio')->middleware('is_candidate');
Route::get('/edit_candidatura_form/{application}/{anuncio}/', [ApplicationController::class, 'edit_index'])->name('edit_candidatura_form');
Route::put('/edit_candidatura/{anuncio}/', [ApplicationController::class, 'edit_candidatura'])->name('edit_candidatura');
Route::delete('/remove_candidatura/{application}/', [ApplicationController::class, 'remove_application'])->name('remove_candidatura');

Route::delete('/remove_candidato/{candidato}/', [CandidatoRegister::class, 'remove_candidato'])->name('remove_candidato');
Route::delete('/remove_empresa/{empresa}/', [EmpresaRegister::class, 'remove_empresa'])->name('remove_empresa');
Route::delete('/remove_user/{user}/', [AdminHomeController::class, 'remove_user'])->name('remove_user');
Route::patch('/promote_demote_user/{user}/', [AdminHomeController::class, 'promote_demote_user'])->name('promote_demote_user');
