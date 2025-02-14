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
    Route::get('/frontend', [FrontendController::class,'index'])->name('frontend.index');
    Route::post('/admin/frontend/update', [FrontendController::class, 'update'])->name('frontend.update');




    Route::resource('categories', CategoryController::class);
    Route::resource('plates', PlateController::class);

});
Route::get('/', [HomeController::class, 'home'])->name('website.home');

require __DIR__ . '/auth.php';
