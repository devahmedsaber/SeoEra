<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\LanguageController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\AdminHomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group. Now create something great!
|
*/

Route::prefix('admin')->name('admin.')->group(function (){
    Route::middleware('checkIsAdmin')->group(function (){
        Route::get('index', [AdminHomeController::class, 'index'])->name('index');

        // Products
        Route::get('products', [ProductController::class, 'index'])->name('products.index');
        Route::get('products/create', [ProductController::class, 'create'])->name('products.create');
        Route::post('products/store', [ProductController::class, 'store'])->name('products.store');
        Route::get('products/edit/{id}', [ProductController::class, 'edit'])->name('products.edit');
        Route::post('products/update/{id}', [ProductController::class, 'update'])->name('products.update');
        Route::delete('products/{id}', [ProductController::class, 'delete'])->name('products.delete');

        // Languages
        Route::get('languages', [LanguageController::class, 'index'])->name('languages.index');
        Route::get('languages/create', [LanguageController::class, 'create'])->name('languages.create');
        Route::post('languages/store', [LanguageController::class, 'store'])->name('languages.store');
        Route::get('languages/edit/{id}', [LanguageController::class, 'edit'])->name('languages.edit');
        Route::post('languages/update/{id}', [LanguageController::class, 'update'])->name('languages.update');
        Route::delete('languages/{id}', [LanguageController::class, 'delete'])->name('languages.delete');

        // Admins
        Route::get('admins', [AdminController::class, 'index'])->name('admins.index');
        Route::get('admins/create', [AdminController::class, 'create'])->name('admins.create');
        Route::post('admins/store', [AdminController::class, 'store'])->name('admins.store');
        Route::get('admins/edit/{id}', [AdminController::class, 'edit'])->name('admins.edit');
        Route::post('admins/update/{id}', [AdminController::class, 'update'])->name('admins.update');
        Route::delete('admins/{id}', [AdminController::class, 'delete'])->name('admins.delete');
    });

    require __DIR__.'/admin_auth.php';
});
