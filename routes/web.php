<?php

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
Route::get('/', function () {
    return view('bienvenida');
});

Route::get('/inicio', function(){
  return view('bienvenida');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('categories', 'Category\CategoryController');
Route::resource('categories.dishes', 'Category\CategoryDishController');
Route::resource('categories.galleries', 'Category\CategoryGalleryController');

Route::resource('clients', 'Client\ClientController');

Route::resource('dishes', 'Dish\DishController');

Route::resource('galleries', 'Gallery\GalleryController');

Route::resource('images', 'Image\ImageController');

Route::resource('payments', 'Payment\PaymentController');

Route::resource('reservations', 'Reservation\ReservationController');

Route::resource('tables', 'Table\TableController');

Route::resource('users', 'User\UserController');