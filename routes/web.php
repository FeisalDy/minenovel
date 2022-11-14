<?php

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

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\NovelInfoController;
use App\Http\Controllers\NovelInputController;
use App\Http\Controllers\ListNovelController;

Route::get('/', [SessionsController::class, 'create']);


Route::redirect('/', '/home');

Route::get('/home', [HomeController::class, 'index']);

Route::get('/about', [AboutController::class, 'index']);

Route::get('/register', [RegistrationController::class, 'create']);
Route::post('register', [RegistrationController::class, 'store']);

Route::get('/login', [SessionsController::class, 'create']);
Route::post('/login', [SessionsController::class, 'store']);
Route::get('/logout', [SessionsController::class, 'destroy']);

Route::get('/input', [NovelInputController::class, 'create']);
Route::post('/input/proses', [NovelInputController::class, 'store']);
Route::get('/novel/{novelId}', [ListNovelController::class, 'createinfo'])->name('create');
Route::get('/novel/{novelId}/{partId}', [ListNovelController::class, 'viewchapter'])->name('view');
Route::get('/input/delete/{novelId}', [NovelInputController::class, 'deletenovel'])->name('deletenovel');

Route::get('/input/chapter/{novelId}', [NovelInputController::class, 'chapter'])->name('inputchapter');
Route::post('/input/chapter/proses', [NovelInputController::class, 'storechapter']);
Route::get('/input/chapter/delete/{novelId}', [NovelInputController::class, 'deletechapter'])->name('deletechapter');

Route::get('/list-novel', [ListNovelController::class, 'index']);

