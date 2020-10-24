<?php

use Illuminate\Support\Facades\Route;

// Auth routes
Auth::routes();

// Frontend routes
Route::get('/', 'Frontend\HomeController@index');

// Backend routes
Route::group(['prefix' => 'admin'], function(){
    Route::name('backend.')->group(function(){

        //Home
        Route::get('/', 'Backend\HomeController@index')->name('home');

        //Profile
        Route::get('user/edit', 'Backend\UserController@edit')->name('user.edit');
        Route::put('user/update', 'Backend\UserController@update')->name('user.update');

        //Users
        Route::resource('users', 'Backend\UsersController');

        //Categories
        Route::get('categories/{category}/delete_thumb', 'Backend\CategoriesController@delete_thumb')->name('categories.delete_thumb');
        Route::resource('categories', 'Backend\CategoriesController');

        //Foods
        Route::get('foods/{food}/delete_thumb', 'Backend\FoodsController@delete_thumb')->name('foods.delete_thumb');
        Route::resource('foods', 'Backend\FoodsController');

        Route::get('combos/{combo}/delete_thumb', 'Backend\CombosController@delete_thumb')->name('combos.delete_thumb');
        Route::resource('combos', 'Backend\CombosController');

        Route::get('addons/{addon}/delete_thumb', 'Backend\AddonsController@delete_thumb')->name('addons.delete_thumb');
        Route::resource('addons', 'Backend\AddonsController');

        Route::resource('outlets', 'Backend\OutletsController');

        Route::resource('coupons', 'Backend\CouponsController');
    });
});

