<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PlateController;
use App\Http\Controllers\Website\HomeController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;


Route::namespace('App\Http\Controllers\Admin')->middleware(['auth'])->prefix('/admin')->as('admin.')->group(function () {
    // dashboard, Profile

    Route::get('/clear-cache', function () {
        if (Artisan::call('optimize:clear') === 0)
            return redirect()->back()->with('success', "Application cache cleared successfully");
    })->name('clear_cache');

    Route::any('/dashboard', 'PlateController@index')->name('dashboard');
    Route::any('/', 'PlateController@index')->name('dashboard');



    Route::get('/profile', 'ProfileController@edit')->name('profile.edit');
    Route::patch('/profile', 'ProfileController@update')->name('profile.update');
    Route::delete('/profile', 'ProfileController@destroy')->name('profile.destroy');

    // forntend management
    Route::get('/frontends', 'FrontendController@index')->name('frontends.index');
    Route::get('/frontends/{key}/edit', 'FrontendController@edit')->name('frontends.edit');
    Route::put('/frontends/{key}', 'FrontendController@update')->name('frontends.update');
    Route::get('/frontends/{key}', 'FrontendController@show')->name('frontends.show');

    Route::post('/frontends/{section}/elements', 'FrontendController@storeElement')->name('frontends.elements.store');
    Route::put('/frontends_elements/{section}/{element}', 'FrontendController@updateElement')->name('frontends.elements.update');
    Route::get('/frontends_elements/{section}/{element}', 'FrontendController@editElement')->name('frontends.elements.edit');
    Route::delete('/frontends_elements/{element}', 'FrontendController@destroyElement')->name('frontends.elements.destroy');





    Route::resource('categories', CategoryController::class);
    Route::resource('plates', PlateController::class);

});
Route::get('/', [HomeController::class, 'home'])->name('website.home');

require __DIR__ . '/auth.php';
