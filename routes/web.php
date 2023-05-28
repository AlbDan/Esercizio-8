<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ArticleController;

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

//Public Controller---------------------------------------------------------------------------------------------------
Route::get('/', [PublicController::class, 'home'])->name('welcome');
Route::get('/author/list/{user}', [PublicController::class, 'authorList'])->name('author.articles');
Route::get('/tag/list/{tag}', [PublicController::class, 'tagList'])->name('tag.articles');

//User Controller-----------------------------------------------------------------------------------------------------
Route::get('/myprofile', [UserController::class, 'showProfile'])->name('myprofile');

//ArticleController---------------------------------------------------------------------------------------------------
//CREATE
Route::get('/insertArticle', [ArticleController::class, 'create'])->middleware('auth')->name('article.create');
Route::post('/storeArticle', [ArticleController::class, 'store'])->middleware('auth')->name('article.store');

//READ
Route::get('/showArticle/{article}', [ArticleController::class, 'show'])->name('article.show');

//UPDATE
Route::get('/editArticle/{article}', [ArticleController::class, 'edit'])->middleware('auth')->name('article.edit');
Route::put('/updateArticle/{article}', [ArticleController::class, 'update'])->middleware('auth')->name('article.update');

//DELETE
Route::delete('/deleteArticle/{article}', [ArticleController::class, 'destroy'])->middleware('auth')->name('article.delete');

//TagController------------------------------------------------------------------------------------------------------
//CREATE
Route::get('/Tag/create', [TagController::class, 'create'])->name('tag.create');
Route::post('/Tag/store', [TagController::class, 'store'])->name('tag.store');

//READ
Route::get('/Tag/index', [TagController::class, 'index'])->name('tag.index');

//UPDATE
Route::get('/Tag/edit/{tag}', [TagController::class, 'edit'])->name('tag.edit');
Route::put('/Tag/update/{tag}', [TagController::class, 'update'])->name('tag.update');

//DELETE
Route::delete('/Tag/delete/{tag}', [TagController::class, 'destroy'])->name('tag.delete');







