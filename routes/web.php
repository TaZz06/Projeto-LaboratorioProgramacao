<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\Auth\CandidatoRegister;
use App\Http\Controllers\Auth\EmpresaRegister;
use App\Http\Controllers\ProfileController;

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

// Auth::routes();
Auth::routes(['verify' => true]);

Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('is_registered');
Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');

Route::post('register_candidato', [CandidatoRegister::class, 'create'])->name('register_candidato');
Route::post('register_empresa', [EmpresaRegister::class, 'create'])->name('register_empresa');

Route::post('profile', [ProfileController::class, 'index'])->name('profile');

Route::post('profile', [ProfileController::class, 'index'])->name('profile');