<?php

use Azuriom\Plugin\Gallery\Controllers\Admin\AdminController;
use Azuriom\Plugin\Gallery\Controllers\Admin\CategoryController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your plugin. These
| routes are loaded by the RouteServiceProvider of your plugin within
| a group which contains the "web" middleware group and your plugin name
| as prefix. Now create something great!
|
*/

// Affichage par défaut (Liste d'image)
Route::get('/image', [AdminController::class, 'index'])->name('image');
Route::put('/set', [AdminController::class, 'set'])->name('set');

// Gestion des paramètre de catégorie
Route::resource('category', CategoryController::class);
