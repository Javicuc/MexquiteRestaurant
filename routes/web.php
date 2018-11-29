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

Route::get('/admin', function () {
    return view('bienvenida');
})->name('panel')->middleware('auth');


// Authentication Routes...
Route::get('login', ['as' => 'login', 'uses' =>'\App\Http\Controllers\Auth\LoginController@showLoginForm']);
Route::post('login', ['as' => 'login', 'uses' =>'\App\Http\Controllers\Auth\LoginController@login']);
Route::get('logout', ['as' => 'logout', 'uses' => '\App\Http\Controllers\Auth\LoginController@logout']);

Route::get('/', 'FrontWeb\HomeController@index')->name('mexquiterestaurant');
Route::get('/menu', 'FrontWeb\MenuController@index')->name('menu');
Route::get('/reservation', 'FrontWeb\ReservationController@index')->name('reservation');
Route::get('/gallery', 'FrontWeb\GalleryController@index')->name('gallery');

Route::get('/aboutUs', function(){
  return view('FrontWeb\AboutUs');
})->name('aboutUs');

Route::get('/contact', function(){
  
  return view('FrontWeb\Contact');
})->name('contact');

Route::group(['prefix' => 'admin'], function(){
	Route::resource('categories', 'Category\CategoryController')->middleware('auth');
	Route::resource('categories.dishes', 'Category\CategoryDishController')->middleware('auth');
	Route::resource('categories.galleries', 'Category\CategoryGalleryController')->middleware('auth');
	
	Route::resource('clients', 'Client\ClientController')->middleware('auth');
	Route::resource('clients.reservations', 'Client\ClientReservationController')->middleware('auth');

	Route::resource('dishes', 'Dish\DishController')->middleware('auth');
	Route::resource('galleries', 'Gallery\GalleryController')->middleware('auth');
	Route::resource('images', 'Image\ImageController')->middleware('auth');
	
	Route::resource('reservations', 'Reservation\ReservationController')->middleware('auth');
	Route::resource('reservations.dishes', 'Reservation\ReservationDishController')->middleware('auth');

	Route::resource('tables', 'Table\TableController')->middleware('auth');
	Route::resource('users', 'User\UserController')->middleware('auth');
});