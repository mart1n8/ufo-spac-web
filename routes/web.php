<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArticleController;

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
/*
Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});
*/
Route::get('/',  [HomeController::class, 'index'])->middleware(['auth:sanctum', 'verified'])->name('/');



Route::get('/clanky/novy',  [ArticleController::class, 'create'])->middleware(['auth:sanctum', 'verified'])->name('article.create');
Route::post('/clanky/novy',  [ArticleController::class, 'store'])->middleware(['auth:sanctum', 'verified'])->name('article.store');
Route::get('/clanky/{clanok}/upravit',  [ArticleController::class, 'edit'])->middleware(['auth:sanctum', 'verified'])->name('article.edit');
Route::post('/clanky/{clanok}/upravit',  [ArticleController::class, 'update'])->middleware(['auth:sanctum', 'verified'])->name('article.update');
Route::get('/clanok/{article}',  [ArticleController::class, 'show'])->middleware(['auth:sanctum', 'verified'])->name('article.show');
