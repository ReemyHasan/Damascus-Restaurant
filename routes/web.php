<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\FrontendController;
use App\Http\Controllers\Admin\PlateController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Website\HomeController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth'])->prefix('/admin')->as('admin.')->group(function () {
    Route::get('/clear-cache', function () {
        if (Artisan::call('optimize:clear') === 0)
            return redirect()->back()->with('success', "Application cache cleared successfully");
    })->name('clear_cache');

    Route::any('/dashboard', [PlateController::class,"index"])->name('dashboard');
    Route::any('/', [PlateController::class,"index"])->name('dashboard');



    Route::get('/profile', [ProfileController::class,"edit"])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class,"update"])->name('profile.update');
    Route::delete('/profile', [ProfileController::class,"destroy"])->name('profile.destroy');

    // forntend management
    Route::get('/frontends', [FrontendController::class,'index'])->name('frontends.index');
    Route::get('/frontends/{key}/edit', [FrontendController::class,'edit'])->name('frontends.edit');
    Route::put('/frontends/{key}', [FrontendController::class,'update'])->name('frontends.update');
    Route::get('/frontends/{key}', [FrontendController::class,'show'])->name('frontends.show');

    Route::post('/frontends/{section}/elements', [FrontendController::class,'storeElement'])->name('frontends.elements.store');
    Route::put('/frontends_elements/{section}/{element}', [FrontendController::class,'updateElement'])->name('frontends.elements.update');
    Route::get('/frontends_elements/{section}/{element}', [FrontendController::class,'editElement'])->name('frontends.elements.edit');
    Route::delete('/frontends_elements/{element}', [FrontendController::class,'destroyElement'])->name('frontends.elements.destroy');





    Route::resource('categories', CategoryController::class);
    Route::resource('plates', PlateController::class);

});
Route::get('/', [HomeController::class, 'home'])->name('website.home');

require __DIR__ . '/auth.php';
