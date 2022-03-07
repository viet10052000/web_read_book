<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\ComicController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [IndexController::class,'home']);
Route::get('/xem-truyen/{slug}', [IndexController::class,'viewComic']);
Route::get('/danh-muc/{slug}', [IndexController::class,'category']);
Route::get('/xem-chapter/{slug}', [IndexController::class,'viewChapter']);
Route::get('/the-loai/{slug}', [IndexController::class,'genre']);
Route::get('/tim-kiem/', [IndexController::class,'search']);
Route::get('/tat-ca',[IndexController::class,'allComic']);
Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::resource('/category',CategoryController::class);
Route::resource('/comic',ComicController::class);
Route::resource('/chapter',ChapterController::class);
Route::resource('/genre',GenreController::class);
